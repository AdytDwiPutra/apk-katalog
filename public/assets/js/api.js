
// ambil token dari localStorage
const tokenFromStorage = localStorage.getItem('token');

const api = axios.create({
  baseURL: API_BASE, // misal: http://backend.test/api
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
  },
  // withCredentials: true, <-- hapus kalau pakai token Bearer
});

// helper set/remove token
function setAuthToken(token) {
  if (token) {
    api.defaults.headers.common['Authorization'] = 'Bearer ' + token;
    localStorage.setItem('token', token);
  } else {
    delete api.defaults.headers.common['Authorization'];
    localStorage.removeItem('token');
  }
}

// set token kalau ada di localStorage
if (tokenFromStorage) setAuthToken(tokenFromStorage);

// interceptor: kalau 401 -> logout/redirect
api.interceptors.response.use(
  response => response,
  error => {
    if (error.response && error.response.status === 401) {
      setAuthToken(null);
      window.location.href = '/';
    }
    return Promise.reject(error);
  }
);

// expose ke global
window.api = api;
window.setAuthToken = setAuthToken;
