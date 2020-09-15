$('#monImage').click(function(e) {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: '$donnes['display']',
        dataType: 'html',
        success: function(response) {
            // Retour...
        }
    });