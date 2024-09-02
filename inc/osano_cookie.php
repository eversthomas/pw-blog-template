
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>

<script>
window.addEventListener("load", function(){
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#000",
                "text": "#fff"
            },
            "button": {
                "background": "#f1d600",
                "text": "#000"
            }
        },
        "type": "opt-in",
        "content": {
            "message": "Diese Webseite verwendet Cookies, um Ihnen das bestmögliche Erlebnis zu bieten.",
            "dismiss": "Verstanden!",
            "allow": "Zustimmen",
            "deny": "Ablehnen",
            "link": "Mehr erfahren",
            "href": "/datenschutz"
        },
        "onInitialise": function (status) {
            var didConsent = this.hasConsented();
            if (didConsent) {
                enableYouTube();
            }
        },
        "onStatusChange": function(status) {
            var didConsent = this.hasConsented();
            if (didConsent) {
                enableYouTube();
            }
        },
        "onRevokeChoice": function() {
            disableYouTube();
        }
    });

    function enableYouTube() {
        var youtubeIframes = document.querySelectorAll('iframe[data-src]');
        youtubeIframes.forEach(function(iframe) {
            iframe.setAttribute('src', iframe.getAttribute('data-src'));
            iframe.removeAttribute('data-src');
            iframe.style.display = 'block'; // Zeigt das iframe an
        });

        var placeholders = document.querySelectorAll('.video-placeholder');
        placeholders.forEach(function(placeholder) {
            placeholder.style.display = 'none'; // Versteckt den Platzhalter
        });
    }

    function disableYouTube() {
        var youtubeIframes = document.querySelectorAll('iframe');
        youtubeIframes.forEach(function(iframe) {
            iframe.setAttribute('src', '');
            iframe.style.display = 'none'; // Versteckt das iframe
        });

        var placeholders = document.querySelectorAll('.video-placeholder');
        placeholders.forEach(function(placeholder) {
            placeholder.style.display = 'flex'; // Zeigt den Platzhalter wieder an
        });
    }
});
</script>
