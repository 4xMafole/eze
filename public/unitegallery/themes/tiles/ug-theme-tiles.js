function UGTheme_tiles(){var e,t,n,i,r,o=new UniteGalleryMain,s=new UGTiles,a=new UGLightbox,l=new UGFunctions,d=new UGTileDesign,u={theme_enable_preloader:!0,theme_preloading_height:200,theme_preloader_vertpos:100,theme_gallery_padding:0,theme_appearance_order:"normal",theme_auto_open:null},_={gallery_width:"100%"},h={showPreloader:!1};function p(i,r){o=i,u=jQuery.extend(u,_),u=jQuery.extend(u,r),function(){1==u.theme_enable_preloader&&(h.showPreloader=!0);switch(u.theme_appearance_order){default:case"normal":break;case"shuffle":o.shuffleItems();break;case"keep":u.tiles_keep_order=!0}}(),o.setOptions(u),o.setFreestyleMode(),t=i.getObjects(),e=jQuery(i),n=t.g_objWrapper,s.init(i,u),a.init(i,u),d=s.getObjTileDesign()}function g(){i&&(i.fadeTo(0,1),n.height(u.theme_preloading_height),l.placeElement(i,"center",u.theme_preloader_vertpos)),function(){i&&o.onEvent(s.events.TILES_FIRST_PLACED,function(){n.height("auto"),i.hide()});jQuery(d).on(d.events.TILE_CLICK,f),e.on(o.events.GALLERY_BEFORE_REQUEST_ITEMS,m),jQuery(a).on(a.events.LIGHTBOX_INIT,y)}(),s.run(),a.run()}function c(){n.addClass("ug-theme-tiles"),n.append("<div class='ug-tiles-wrapper' style='position:relative'></div>"),1==h.showPreloader&&(n.append("<div class='ug-tiles-preloader ug-preloader-trans'></div>"),(i=n.children(".ug-tiles-preloader")).fadeTo(0,0)),r=n.children(".ug-tiles-wrapper"),u.theme_gallery_padding&&n.css({"padding-left":u.theme_gallery_padding+"px","padding-right":u.theme_gallery_padding+"px"}),s.setHtml(r),a.putHtml(),g()}function f(e,t){t=jQuery(t);var n=d.getItemByTile(t).index;a.open(n)}function m(){if(r.hide(),i){i.show();var e=l.getElementSize(i).bottom+30;n.height(e)}}function y(){null!==u.theme_auto_open&&(a.open(u.theme_auto_open),u.theme_auto_open=null)}this.destroy=function(){jQuery(d).off(d.events.TILE_CLICK),o.destroyEvent(s.events.TILES_FIRST_PLACED),e.off(o.events.GALLERY_BEFORE_REQUEST_ITEMS),jQuery(a).off(a.events.LIGHTBOX_INIT),s.destroy(),a.destroy()},this.run=function(){c()},this.addItems=function(){s.runNewItems()},this.init=function(e,t){p(e,t)}}"undefined"!=typeof g_ugFunctions?g_ugFunctions.registerTheme("tiles"):jQuery(document).ready(function(){g_ugFunctions.registerTheme("tiles")});
