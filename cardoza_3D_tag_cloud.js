
jQuery(document).ready(function() {
    if(!jQuery('#myCanvas').tagcanvas({
      textColour: '#333333',
      outlineColour: '#000000',
      reverse: true,
      depth: 0.8,
      maxSpeed: 0.05
    },'tags')) {
      // something went wrong, hide the canvas container
      $('#myCanvasContainer').hide();
    }
  });
