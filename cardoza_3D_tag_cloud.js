$j = jQuery.noConflict();
$j(document).ready(function() {
    if(!$j('#myCanvas').tagcanvas({
        textColour: '#333333',
        outlineColour: '#000000',
        reverse: true,
        depth: 0.8,
        textFont: null,
        weight: true,
        maxSpeed: 0.05
    },'tags')) {
        // something went wrong, hide the canvas container
        $j('#myCanvasContainer').hide();
    }
});

