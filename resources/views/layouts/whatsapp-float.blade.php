
<div class="whatsapp-wrapper">
    <a href="javascript:void(0)" 
       class="whatsapp-float" 
       id="whatsappBtn"
       title="Chat via WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span class="whatsapp-tooltip">Chat with us!</span>
    </a>
</div>

<style>
.whatsapp-wrapper {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 1000;
}

.whatsapp-float {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    color: white;
    border-radius: 50%;
    text-decoration: none;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}

.whatsapp-float:hover {
    transform: translateY(-5px);
    box-shadow: 2px 7px 15px rgba(0,0,0,0.3);
    color: white;
}

.whatsapp-float i {
    font-size: 32px;
}

.whatsapp-tooltip {
    position: absolute;
    right: 75px;
    background: #333;
    color: white;
    padding: 5px 12px;
    border-radius: 4px;
    font-size: 13px;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.whatsapp-tooltip::after {
    content: '';
    position: absolute;
    right: -6px;
    top: 50%;
    transform: translateY(-50%);
    border-left: 6px solid #333;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
}

.whatsapp-float:hover .whatsapp-tooltip {
    opacity: 1;
    visibility: visible;
    right: 70px;
}

@media (max-width: 576px) {
    .whatsapp-wrapper {
        bottom: 20px;
        right: 20px;
    }
    
    .whatsapp-float {
        width: 50px;
        height: 50px;
    }
    
    .whatsapp-float i {
        font-size: 26px;
    }
}
</style>
