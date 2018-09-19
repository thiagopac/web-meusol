/** 
CWS Parallax scroll plugin
**/

(function ( $ ){
  
  $.fn.cws_prlx = cws_prlx;

  window.addEventListener( 'scroll', function (){
    if ( window.cws_prlx != undefined && !window.cws_prlx.disabled ){
      window.cws_prlx.translate_layers();
    }
  }, false );

  window.addEventListener( 'resize', function (){
    var i, section_id, section_params;
    if ( window.cws_prlx != undefined ){
      if ( window.cws_prlx.servant.is_mobile() ){
        if ( !window.cws_prlx.disabled ){
          for ( layer_id in window.cws_prlx.layers ){
            window.cws_prlx.layers[layer_id].el.removeAttribute( 'style' );
          }
          window.cws_prlx.disabled = true;          
        }
      }
      else{
        if ( window.cws_prlx.disabled ){
          window.cws_prlx.disabled = false;
        }
        for ( section_id in window.cws_prlx.sections ){
          section_params = window.cws_prlx.sections[section_id];
          if ( section_params.height != section_params.el.offsetHeight ){
            window.cws_prlx.prepare_section_data( section_id );
          }
        }
      }
    }
  }, false );

  function cws_prlx ( args ){
    var factory, sects;
    sects = $( this );
    if ( !sects.length ) return;
    factory = new cws_prlx_factory( args );
    window.cws_prlx = window.cws_prlx != undefined ? window.cws_prlx : new cws_prlx_builder ();
    sects.each( function (){
      var sect = $( this );
      var sect_id = factory.add_section( sect );
      if ( sect_id ) window.cws_prlx.prepare_section_data( sect_id );
    });
  }

  function cws_prlx_factory ( args ){
    var args = args != undefined ? args : {};
    args.def_speed = args.def_speed != undefined && !isNaN( parseInt( args.def_speed ) ) && parseInt( args.def_speed > 0 ) && parseInt( args.def_speed <= 100 ) ? args.def_speed : 50;
    args.layer_sel = args.layer_sel != undefined && typeof args.layer_sel == "string" && args.layer_sel.length ? args.layer_sel : ".cws_prlx_layer";  
    this.args = args;
    this.add_section = cws_prlx_add_section;
    this.add_layer = cws_prlx_add_layer; 
    this.remove_layer = cws_prlx_remove_layer;   
  }

  function cws_prlx_builder (){
    this.servant = new cws_servant ();
    this.sections = {};
    this.layers = {}; 
    this.calc_layer_speed = cws_prlx_calc_layer_speed;
    this.prepare_section_data = cws_prlx_prepare_section_data;
    this.prepare_layer_data = cws_prlx_prepare_layer_data;
    this.translate_layers = cws_prlx_translate_layers;
    this.translate_layer = cws_prlx_translate_layer;
    this.conditions = {};
    this.conditions.layer_loaded = cws_prlx_layer_loaded_condition;
    this.disabled = false;
  }

  function cws_prlx_add_section ( section_obj ){
    var factory, section, section_id, layers, layer, i;
    factory = this;
    section = section_obj[0];
    layers = $( factory.args.layer_sel, section_obj );
    if ( !layers.length ) return false;
    section_id = window.cws_prlx.servant.uniq_id( 'cws_prlx_section_' );
    section.id = section_id;

    window.cws_prlx.sections[section_id] = {
      'el' : section,
      'height' : null,
      'layer_sel' : factory.args.layer_sel
    }

    if ( /cws_Yt_video_bg/.test( section.className ) ){  /* for youtube video background */ 
      section.addEventListener( "DOMNodeRemoved", function ( e ){
        var el = e.srcElement ? e.srcElement : e.target;
        if ( $( el ).is( factory.args.layer_sel ) ){
          factory.remove_layer( el.id );
        }
      }, false );
      section.addEventListener( "DOMNodeInserted", function ( e ){
        var el = e.srcElement ? e.srcElement : e.target;
        if ( $( el ).is( factory.args.layer_sel ) ){
          factory.add_layer( el, section_id );
        }
      }, false );
    }

    section.addEventListener( "DOMNodeRemoved", function ( e ){ /* for dynamically removed content */
      window.cws_prlx.prepare_section_data( section_id );
    },false );
    section.addEventListener( "DOMNodeInserted", function ( e ){ /* for dynamically added content */
      window.cws_prlx.prepare_section_data( section_id );
    },false );

    for ( i = 0; i < layers.length; i++ ){
      layer = layers[i];
      factory.add_layer( layer, section_id )
    }

    return section_id;

  }

  function cws_prlx_add_layer ( layer, section_id ){
    var factory, layer_rel_speed, layer_params;
    factory = this;
    layer.id = !layer.id.length ? window.cws_prlx.servant.uniq_id( 'cws_prlx_layer_' ) : layer.id;
    layer_rel_speed = $( layer ).data( 'scroll-speed' );
    layer_rel_speed = layer_rel_speed != undefined ? layer_rel_speed : factory.args.def_speed;
    layer_params = {
      'el' : layer,
      'section_id' : section_id,
      'height' : null,
      'loaded' : false,
      'rel_speed' : layer_rel_speed,
      'speed' : null
    }
    window.cws_prlx.layers[layer.id] = layer_params;
    return layer.id;
  }

  function cws_prlx_remove_layer ( layer_id ){
    var layers;
    layers = window.cws_prlx.layers;
    if ( layers[layer_id] != undefined ){
      delete layers[layer_id];
    }
  }

  function cws_prlx_prepare_section_data ( section_id ){
    var section, section_params, layer_sel, layers, layer, layer_id, i;
    if ( !Object.keys( window.cws_prlx.sections ).length || window.cws_prlx.sections[section_id] == undefined ) return false;
    section_params = window.cws_prlx.sections[section_id];
    section = section_params.el;
    section_params.height = section.offsetHeight;
    section_obj = $( section );
    layers = $( section_params.layer_sel, section_obj );
    for ( i=0; i<layers.length; i++ ){
      layer = layers[i];
      layer_id = layer.id;
      if ( layer_id ) window.cws_prlx.prepare_layer_data( layer_id, section_id );
    }
  }

  function cws_prlx_prepare_layer_data ( layer_id, section_id ){
    window.cws_prlx.servant.wait_for( 'layer_loaded', [ layer_id ], function ( layer_id ){
      var layer_params, layer;
      layer_params = window.cws_prlx.layers[layer_id];
      layer = layer_params.el;
      layer_params.height = layer.offsetHeight;
      window.cws_prlx.calc_layer_speed( layer_id );
      window.cws_prlx.translate_layer( layer_id );
      layer_params.loaded = true;
    }, [ layer_id ]);    
  }

  function cws_prlx_translate_layers (){
    var layers, layer_ids, layer_id, i;
    if ( window.cws_prlx == undefined ) return;
    layers = window.cws_prlx.layers;
    layer_ids = Object.keys( layers );
    for ( i = 0; i < layer_ids.length; i++ ){
      layer_id = layer_ids[i];
      window.cws_prlx.translate_layer( layer_id );
    }
  }

  function cws_prlx_translate_layer ( layer_id ){
    var layer_params, section, layer, layer_translation, style_adjs;
    if ( window.cws_prlx == undefined || window.cws_prlx.layers[layer_id] == undefined ) return false;
    layer_params = window.cws_prlx.layers[layer_id];
    if ( layer_params.speed == null ) return false;
    if ( layer_params.section_id == undefined || window.cws_prlx.sections[layer_params.section_id] == undefined ) return false;
    section = window.cws_prlx.sections[layer_params.section_id].el;
    if ( window.cws_prlx.servant.is_visible( section ) ) {
      layer = layer_params.el;
      layer_translation = ( section.getBoundingClientRect().top - window.innerHeight ) * layer_params.speed;
      style_adjs = {
        "WebkitTransform" : "translate(-50%," + layer_translation + "px)",
        "MozTransform" : "translate(-50%," + layer_translation + "px)",
        "msTransform" : "translate(-50%," + layer_translation + "px)",
        "OTransform" : "translate(-50%," + layer_translation + "px)",
        "transform" : "translate(-50%," + layer_translation + "px)"
      }
      for ( key in style_adjs ){
        layer.style[key] = style_adjs[key];
      }
    }
  }

  function cws_servant (){
    this.uniq_id = cws_uniq_id;
    this.wait_for = cws_wait_for;
    this.is_visible = cws_is_visible;
    this.is_mobile = cws_is_mobile;
  }

  function cws_uniq_id ( prefix ){
    var d, t, n, id;
    var prefix = prefix != undefined ? prefix : "";
    d = new Date();
    t = d.getTime();
    n = parseInt( Math.random() * t );
    id = prefix + n;
    return id;
  }

  function cws_wait_for ( condition, condition_args, callback, callback_args ){
    var match = false;
    var condition_args = condition_args != undefined && typeof condition_args == 'object' ? condition_args : new Array();
    var callback_args = callback_args != undefined && typeof callback_args == 'object' ? callback_args : new Array();
    if ( condition == undefined || typeof condition != 'string' || callback == undefined || typeof callback != 'function' ) return match;
    match = window.cws_prlx.conditions[condition].apply( window, condition_args );
    if ( match == true ){
      callback.apply( window, callback_args );
      return true;
    }
    else if ( match == false ){
      setTimeout( function (){
        cws_wait_for ( condition, condition_args, callback, callback_args );
      }, 10);
    }
    else{
      return false;
    }
  }

  function cws_is_visible ( el ){
    var window_top, window_height, window_bottom, el_top, el_height, el_bottom, r;
    window_top = window.pageYOffset;
    window_height = window.innerHeight;
    window_bottom = window_top + window_height;
    el_top = $( el ).offset().top;
    el_height = el.offsetHeight;
    el_bottom = el_top + el_height;
    r = ( el_top > window_top && el_top < window_bottom ) || ( el_top < window_top && el_bottom > window_bottom ) || ( el_bottom > window_top && el_bottom < window_bottom ) ? true : false;
    return r;
  }

  function cws_is_mobile (){
    return window.innerWidth < 768;
  }

  function cws_prlx_layer_loaded_condition ( layer_id ){
    var layer, r;
    r = false;
    if ( layer_id == undefined || typeof layer_id != 'string' ) return r;
    if ( window.cws_prlx.layers[layer_id] == undefined ) return r;
    layer = window.cws_prlx.layers[layer_id].el;
    switch ( layer.tagName ){
      case "IMG":
        if ( layer.complete == undefined ){
          console.log( 'img hasn\'t complete property' );
        }
        else{
          if ( !layer.complete ){
            return r;
          }
        }
        break;  
      case "DIV":  /* for youtube video background */
        if ( /^video-/.test( layer.id ) ){
          return r;
        }
        break;      
    }
    return true;
  }

  function cws_prlx_calc_layer_speed ( layer_id ){
    var layer_params, layer, section_id, section_params, window_height;
    layer_params = window.cws_prlx.layers[layer_id];
    layer = layer_params.el;
    section_id = layer_params.section_id;
    section_params = window.cws_prlx.sections[section_id];
    window_height = window.innerHeight;
    layer_params.speed = ( ( layer_params.height - section_params.height ) / ( window_height + section_params.height ) ) * ( layer_params.rel_speed / 100 );
  }

}(jQuery));
