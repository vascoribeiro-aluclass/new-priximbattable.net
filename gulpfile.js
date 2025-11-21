/* === PLUGINS */
var gulp         = require('gulp');
var plumber      = require('gulp-plumber');
var uglify       = require('gulp-uglify');
var stylus       = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS    = require('gulp-minify-css');


/* === LOCAIS === */
var localSrcTheme  = "./themes/classic/assets/";
var localSrcNDKModule  = "./modules/ndk_advanced_custom_fields/";


/* === CSS === */
/* Theme */
var custom_FilenameCSS = "custom";
var custom_ExtCSS      = "css";
var custom_StartCSS    = localSrcTheme+"/css/src/"+custom_FilenameCSS+"."+custom_ExtCSS;
gulp.task(custom_FilenameCSS+":"+custom_ExtCSS, function () {
	return gulp.src(custom_StartCSS)
		.pipe(stylus({ compress: false, paths: [custom_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});

var newAlu_FilenameCSS = "newAlu";
var newAlu_ExtCSS      = "css";
var newAlu_StartCSS    = localSrcTheme+"/css/src/"+newAlu_FilenameCSS+"."+newAlu_ExtCSS;
gulp.task(newAlu_FilenameCSS+":"+newAlu_ExtCSS, function () {
	return gulp.src(newAlu_StartCSS)
		.pipe(stylus({ compress: false, paths: [newAlu_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});

var product_FilenameCSS = "product";
var product_ExtCSS      = "css";
var product_StartCSS    = localSrcTheme+"/css/src/"+product_FilenameCSS+"."+product_ExtCSS;
gulp.task(product_FilenameCSS+":"+product_ExtCSS, function () {
	return gulp.src(product_StartCSS)
		.pipe(stylus({ compress: false, paths: [product_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});
var catagory_FilenameCSS = "catagory";
var catagory_ExtCSS      = "css";
var catagory_StartCSS    = localSrcTheme+"/css/src/"+catagory_FilenameCSS+"."+catagory_ExtCSS;
gulp.task(catagory_FilenameCSS+":"+catagory_ExtCSS, function () {
	return gulp.src(catagory_StartCSS)
		.pipe(stylus({ compress: false, paths: [catagory_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});
var shoppingcart_FilenameCSS = "shoppingcart";
var shoppingcart_ExtCSS      = "css";
var shoppingcart_StartCSS    = localSrcTheme+"/css/src/"+shoppingcart_FilenameCSS+"."+shoppingcart_ExtCSS;
gulp.task(shoppingcart_FilenameCSS+":"+shoppingcart_ExtCSS, function () {
	return gulp.src(shoppingcart_StartCSS)
		.pipe(stylus({ compress: false, paths: [shoppingcart_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});
var orderclient_FilenameCSS = "orderclient";
var orderclient_ExtCSS      = "css";
var orderclient_StartCSS    = localSrcTheme+"/css/src/"+orderclient_FilenameCSS+"."+orderclient_ExtCSS;
gulp.task(orderclient_FilenameCSS+":"+orderclient_ExtCSS, function () {
	return gulp.src(orderclient_StartCSS)
		.pipe(stylus({ compress: false, paths: [orderclient_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});
var theme_FilenameCSS = "theme";
var theme_ExtCSS      = "css";
var theme_StartCSS    = localSrcTheme+"/css/src/"+theme_FilenameCSS+"."+theme_ExtCSS;
gulp.task(theme_FilenameCSS+":"+theme_ExtCSS, function () {
	return gulp.src(theme_StartCSS)
		.pipe(stylus({ compress: false, paths: [theme_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});

var error_FilenameCSS = "error";
var error_ExtCSS      = "css";
var error_StartCSS    = localSrcTheme+"/css/src/"+error_FilenameCSS+"."+error_ExtCSS;
gulp.task(error_FilenameCSS+":"+error_ExtCSS, function () {
	return gulp.src(error_StartCSS)
		.pipe(stylus({ compress: false, paths: [error_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcTheme+"/css/"));
});

/* NDK */
var admin_FilenameCSS = "admin";
var admin_ExtCSS      = "css";
var admin_StartCSS    = localSrcNDKModule+"/views/css/src/"+admin_FilenameCSS+"."+admin_ExtCSS;
gulp.task(admin_FilenameCSS+":"+admin_ExtCSS, function () {
	return gulp.src(admin_StartCSS)
		.pipe(stylus({ compress: false, paths: [admin_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var dynamicPrice_FilenameCSS = "dynamicprice";
var dynamicPrice_ExtCSS      = "css";
var dynamicPrice_StartCSS    = localSrcNDKModule+"/views/css/src/"+dynamicPrice_FilenameCSS+"."+dynamicPrice_ExtCSS;
gulp.task(dynamicPrice_FilenameCSS+":"+dynamicPrice_ExtCSS, function () {
	return gulp.src(dynamicPrice_StartCSS)
		.pipe(stylus({ compress: false, paths: [dynamicPrice_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var fontSelector_FilenameCSS = "fontselector";
var fontSelector_ExtCSS      = "css";
var fontSelector_StartCSS    = localSrcNDKModule+"/views/css/src/"+fontSelector_FilenameCSS+"."+fontSelector_ExtCSS;
gulp.task(fontSelector_FilenameCSS+":"+fontSelector_ExtCSS, function () {
	return gulp.src(fontSelector_StartCSS)
		.pipe(stylus({ compress: false, paths: [fontSelector_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var front_FilenameCSS = "front";
var front_ExtCSS      = "css";
var front_StartCSS    = localSrcNDKModule+"/views/css/src/"+front_FilenameCSS+"."+front_ExtCSS;
gulp.task(front_FilenameCSS+":"+front_ExtCSS, function () {
	return gulp.src(front_StartCSS)
		.pipe(stylus({ compress: false, paths: [front_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var loader_FilenameCSS = "loader";
var loader_ExtCSS      = "css";
var loader_StartCSS    = localSrcNDKModule+"/views/css/src/"+loader_FilenameCSS+"."+loader_ExtCSS;
gulp.task(loader_FilenameCSS+":"+loader_ExtCSS, function () {
	return gulp.src(loader_StartCSS)
		.pipe(stylus({ compress: false, paths: [loader_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var ndkacf_FilenameCSS = "ndkacf";
var ndkacf_ExtCSS      = "css";
var ndkacf_StartCSS    = localSrcNDKModule+"/views/css/src/"+ndkacf_FilenameCSS+"."+ndkacf_ExtCSS;
gulp.task(ndkacf_FilenameCSS+":"+ndkacf_ExtCSS, function () {
	return gulp.src(ndkacf_StartCSS)
		.pipe(stylus({ compress: false, paths: [ndkacf_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var ndkdesigner_FilenameCSS = "ndkdesigner";
var ndkdesigner_ExtCSS      = "css";
var ndkdesigner_StartCSS    = localSrcNDKModule+"/views/css/src/"+ndkdesigner_FilenameCSS+"."+ndkdesigner_ExtCSS;
gulp.task(ndkdesigner_FilenameCSS+":"+ndkdesigner_ExtCSS, function () {
	return gulp.src(ndkdesigner_StartCSS)
		.pipe(stylus({ compress: false, paths: [ndkdesigner_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

var order_FilenameCSS = "order";
var order_ExtCSS      = "css";
var order_StartCSS    = localSrcNDKModule+"/views/css/src/"+order_FilenameCSS+"."+order_ExtCSS;
gulp.task(order_FilenameCSS+":"+order_ExtCSS, function () {
	return gulp.src(order_StartCSS)
		.pipe(stylus({ compress: false, paths: [order_StartCSS] }))
		.pipe(autoprefixer())
		.pipe(minifyCSS())
		.pipe(gulp.dest(localSrcNDKModule+"/views/css/"));
});

/* === JS === */
/* Theme */
var custom_FilenameJS = "custom";
var custom_ExtJS      = "js";
var custom_StartJS    = localSrcTheme+"/js/src/"+custom_FilenameJS+"."+custom_ExtJS;
gulp.task(custom_FilenameJS+":"+custom_ExtJS, function () {
	return gulp.src(custom_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcTheme+"/js/"));
});

var theme_FilenameJS = "theme";
var theme_ExtJS      = "js";
var theme_StartJS    = localSrcTheme+"/js/src/"+theme_FilenameJS+"."+theme_ExtJS;
gulp.task(theme_FilenameJS+":"+theme_ExtJS, function () {
	return gulp.src(theme_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcTheme+"/js/"));
});

/* NDK */
var admin_FilenameJS = "admin";
var admin_ExtJS      = "js";
var admin_StartJS    = localSrcNDKModule+"/views/js/src/"+admin_FilenameJS+"."+admin_ExtJS;
gulp.task(admin_FilenameJS+":"+admin_ExtJS, function () {
	return gulp.src(admin_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var autoResize_FilenameJS = "autoresize";
var autoResize_ExtJS      = "js";
var autoResize_StartJS    = localSrcNDKModule+"/views/js/src/"+autoResize_FilenameJS+"."+autoResize_ExtJS;
gulp.task(autoResize_FilenameJS+":"+autoResize_ExtJS, function () {
	return gulp.src(autoResize_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var dynamicPrice_FilenameJS = "dynamicprice";
var dynamicPrice_ExtJS      = "js";
var dynamicPrice_StartJS    = localSrcNDKModule+"/views/js/src/"+dynamicPrice_FilenameJS+"."+dynamicPrice_ExtJS;
gulp.task(dynamicPrice_FilenameJS+":"+dynamicPrice_ExtJS, function () {
	return gulp.src(dynamicPrice_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var fromPrice_FilenameJS = "fromprice";
var fromPrice_ExtJS      = "js";
var fromPrice_StartJS    = localSrcNDKModule+"/views/js/src/"+fromPrice_FilenameJS+"."+fromPrice_ExtJS;
gulp.task(fromPrice_FilenameJS+":"+fromPrice_ExtJS, function () {
	return gulp.src(fromPrice_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var htmlCanvasNdk_FilenameJS = "html2canvas.ndk";
var htmlCanvasNdk_ExtJS      = "js";
var htmlCanvasNdk_StartJS    = localSrcNDKModule+"/views/js/src/"+htmlCanvasNdk_FilenameJS+"."+htmlCanvasNdk_ExtJS;
gulp.task(htmlCanvasNdk_FilenameJS+":"+htmlCanvasNdk_ExtJS, function () {
	return gulp.src(htmlCanvasNdk_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var htmlCanvasSvg_FilenameJS = "html2canvas.svg";
var htmlCanvasSvg_ExtJS      = "js";
var htmlCanvasSvg_StartJS    = localSrcNDKModule+"/views/js/src/"+htmlCanvasSvg_FilenameJS+"."+htmlCanvasSvg_ExtJS;
gulp.task(htmlCanvasSvg_FilenameJS+":"+htmlCanvasSvg_ExtJS, function () {
	return gulp.src(htmlCanvasSvg_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var imageToCanvas_FilenameJS = "imagetocanvas";
var imageToCanvas_ExtJS      = "js";
var imageToCanvas_StartJS    = localSrcNDKModule+"/views/js/src/"+imageToCanvas_FilenameJS+"."+imageToCanvas_ExtJS;
gulp.task(imageToCanvas_FilenameJS+":"+imageToCanvas_ExtJS, function () {
	return gulp.src(imageToCanvas_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var imageTracer_FilenameJS = "imagetracer_v1.2.4";
var imageTracer_ExtJS      = "js";
var imageTracer_StartJS    = localSrcNDKModule+"/views/js/src/"+imageTracer_FilenameJS+"."+imageTracer_ExtJS;
gulp.task(imageTracer_FilenameJS+":"+imageTracer_ExtJS, function () {
	return gulp.src(imageTracer_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var jqFontSelector_FilenameJS = "jquery.fontselector";
var jqFontSelector_ExtJS      = "js";
var jqFontSelector_StartJS    = localSrcNDKModule+"/views/js/src/"+jqFontSelector_FilenameJS+"."+jqFontSelector_ExtJS;
gulp.task(jqFontSelector_FilenameJS+":"+jqFontSelector_ExtJS, function () {
	return gulp.src(jqFontSelector_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var jqLettering_FilenameJS = "jquery.lettering";
var jqLettering_ExtJS      = "js";
var jqLettering_StartJS    = localSrcNDKModule+"/views/js/src/"+jqLettering_FilenameJS+"."+jqLettering_ExtJS;
gulp.task(jqLettering_FilenameJS+":"+jqLettering_ExtJS, function () {
	return gulp.src(jqLettering_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var jqMask_FilenameJS = "jquery.mask";
var jqMask_ExtJS      = "js";
var jqMask_StartJS    = localSrcNDKModule+"/views/js/src/"+jqMask_FilenameJS+"."+jqMask_ExtJS;
gulp.task(jqMask_FilenameJS+":"+jqMask_ExtJS, function () {
	return gulp.src(jqMask_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var jqMaskLength_FilenameJS = "jquery.maxlength";
var jqMaskLength_ExtJS      = "js";
var jqMaskLength_StartJS    = localSrcNDKModule+"/views/js/src/"+jqMaskLength_FilenameJS+"."+jqMaskLength_ExtJS;
gulp.task(jqMaskLength_FilenameJS+":"+jqMaskLength_ExtJS, function () {
	return gulp.src(jqMaskLength_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var jqResize_FilenameJS = "jquery.resize";
var jqResize_ExtJS      = "js";
var jqResize_StartJS    = localSrcNDKModule+"/views/js/src/"+jqResize_FilenameJS+"."+jqResize_ExtJS;
gulp.task(jqResize_FilenameJS+":"+jqResize_ExtJS, function () {
	return gulp.src(jqResize_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var jqSimulate_FilenameJS = "jquery.simulate";
var jqSimulate_ExtJS      = "js";
var jqSimulate_StartJS    = localSrcNDKModule+"/views/js/src/"+jqSimulate_FilenameJS+"."+jqSimulate_ExtJS;
gulp.task(jqSimulate_FilenameJS+":"+jqSimulate_ExtJS, function () {
	return gulp.src(jqSimulate_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var ndkacf_FilenameJS = "ndkacf";
var ndkacf_ExtJS      = "js";
var ndkacf_StartJS    = localSrcNDKModule+"/views/js/src/"+ndkacf_FilenameJS+"."+ndkacf_ExtJS;
gulp.task(ndkacf_FilenameJS+":"+ndkacf_ExtJS, function () {
	return gulp.src(ndkacf_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var posndkacf_FilenameJS = "posndkacf";
var posndkacf_ExtJS      = "js";
var posndkacf_StartJS    = localSrcNDKModule+"/views/js/src/"+posndkacf_FilenameJS+"."+posndkacf_ExtJS;
gulp.task(posndkacf_FilenameJS+":"+posndkacf_ExtJS, function () {
	return gulp.src(posndkacf_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var aluclassfunction_FilenameJS = "aluclassfunction";
var aluclassfunction_ExtJS      = "js";
var aluclassfunction_StartJS    = localSrcNDKModule+"/views/js/src/"+aluclassfunction_FilenameJS+"."+aluclassfunction_ExtJS;
gulp.task(aluclassfunction_FilenameJS+":"+aluclassfunction_ExtJS, function () {
	return gulp.src(aluclassfunction_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var ndkPortail_FilenameJS = "ndkPortail";
var ndkPortail_ExtJS      = "js";
var ndkPortail_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkPortail_FilenameJS+"."+ndkPortail_ExtJS;
gulp.task(ndkPortail_FilenameJS+":"+ndkPortail_ExtJS, function () {
	return gulp.src(ndkPortail_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkloadgeneric_FilenameJS = "ndkloadgeneric";
var ndkloadgeneric_ExtJS      = "js";
var ndkloadgeneric_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkloadgeneric_FilenameJS+"."+ndkloadgeneric_ExtJS;
gulp.task(ndkloadgeneric_FilenameJS+":"+ndkloadgeneric_ExtJS, function () {
	return gulp.src(ndkloadgeneric_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});


var ndkgrillagerigide_FilenameJS = "ndkgrillagerigide";
var ndkgrillagerigide_ExtJS      = "js";
var ndkgrillagerigide_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkgrillagerigide_FilenameJS+"."+ndkgrillagerigide_ExtJS;
gulp.task(ndkgrillagerigide_FilenameJS+":"+ndkgrillagerigide_ExtJS, function () {
	return gulp.src(ndkgrillagerigide_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkgardecorps_FilenameJS = "ndkgardecorps";
var ndkgardecorps_ExtJS      = "js";
var ndkgardecorps_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkgardecorps_FilenameJS+"."+ndkgardecorps_ExtJS;
gulp.task(ndkgardecorps_FilenameJS+":"+ndkgardecorps_ExtJS, function () {
	return gulp.src(ndkgardecorps_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkcloturealu_FilenameJS = "ndkcloturealu";
var ndkcloturealu_ExtJS      = "js";
var ndkcloturealu_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkcloturealu_FilenameJS+"."+ndkcloturealu_ExtJS;
gulp.task(ndkcloturealu_FilenameJS+":"+ndkcloturealu_ExtJS, function () {
	return gulp.src(ndkcloturealu_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkbarrierepiscine_FilenameJS = "ndkbarrierepiscine";
var ndkbarrierepiscine_ExtJS      = "js";
var ndkbarrierepiscine_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkbarrierepiscine_FilenameJS+"."+ndkbarrierepiscine_ExtJS;
gulp.task(ndkbarrierepiscine_FilenameJS+":"+ndkbarrierepiscine_ExtJS, function () {
	return gulp.src(ndkbarrierepiscine_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});



var ndkgaragesectionnelle_FilenameJS = "ndkgaragesectionnelle";
var ndkgaragesectionnelle_ExtJS      = "js";
var ndkgaragesectionnelle_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkgaragesectionnelle_FilenameJS+"."+ndkgaragesectionnelle_ExtJS;
gulp.task(ndkgaragesectionnelle_FilenameJS+":"+ndkgaragesectionnelle_ExtJS, function () {
	return gulp.src(ndkgaragesectionnelle_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkgaragebattente_FilenameJS = "ndkgaragebattente";
var ndkgaragebattente_ExtJS      = "js";
var ndkgaragebattente_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkgaragebattente_FilenameJS+"."+ndkgaragebattente_ExtJS;
gulp.task(ndkgaragebattente_FilenameJS+":"+ndkgaragebattente_ExtJS, function () {
	return gulp.src(ndkgaragebattente_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkvoletroulant_FilenameJS = "ndkvoletroulant";
var ndkvoletroulant_ExtJS      = "js";
var ndkvoletroulant_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkvoletroulant_FilenameJS+"."+ndkvoletroulant_ExtJS;
gulp.task(ndkvoletroulant_FilenameJS+":"+ndkvoletroulant_ExtJS, function () {
	return gulp.src(ndkvoletroulant_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkfenetre_FilenameJS = "ndkfenetre";
var ndkfenetre_ExtJS      = "js";
var ndkfenetre_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkfenetre_FilenameJS+"."+ndkfenetre_ExtJS;
gulp.task(ndkfenetre_FilenameJS+":"+ndkfenetre_ExtJS, function () {
	return gulp.src(ndkfenetre_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkpvcfenetre_FilenameJS = "ndkpvcfenetre";
var ndkpvcfenetre_ExtJS      = "js";
var ndkpvcfenetre_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkpvcfenetre_FilenameJS+"."+ndkpvcfenetre_ExtJS;
gulp.task(ndkpvcfenetre_FilenameJS+":"+ndkpvcfenetre_ExtJS, function () {
	return gulp.src(ndkpvcfenetre_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkportedentree_FilenameJS = "ndkportedentree";
var ndkportedentree_ExtJS      = "js";
var ndkportedentree_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkportedentree_FilenameJS+"."+ndkportedentree_ExtJS;
gulp.task(ndkportedentree_FilenameJS+":"+ndkportedentree_ExtJS, function () {
	return gulp.src(ndkportedentree_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});


var ndkverriere_FilenameJS = "ndkverriere";
var ndkverriere_ExtJS      = "js";
var ndkverriere_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkverriere_FilenameJS+"."+ndkverriere_ExtJS;
gulp.task(ndkverriere_FilenameJS+":"+ndkverriere_ExtJS, function () {
	return gulp.src(ndkverriere_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});


var ndkpergolaaluminium_FilenameJS = "ndkpergolaaluminium";
var ndkpergolaaluminium_ExtJS      = "js";
var ndkpergolaaluminium_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkpergolaaluminium_FilenameJS+"."+ndkpergolaaluminium_ExtJS;
gulp.task(ndkpergolaaluminium_FilenameJS+":"+ndkpergolaaluminium_ExtJS, function () {
	return gulp.src(ndkpergolaaluminium_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkpergolabioclimatique_FilenameJS = "ndkpergolabioclimatique";
var ndkpergolabioclimatique_ExtJS      = "js";
var ndkpergolabioclimatique_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkpergolabioclimatique_FilenameJS+"."+ndkpergolabioclimatique_ExtJS;
gulp.task(ndkpergolabioclimatique_FilenameJS+":"+ndkpergolabioclimatique_ExtJS, function () {
	return gulp.src(ndkpergolabioclimatique_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});


var ndkportaservice_FilenameJS = "ndkportaservice";
var ndkportaservice_ExtJS      = "js";
var ndkportaservice_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkportaservice_FilenameJS+"."+ndkportaservice_ExtJS;
gulp.task(ndkportaservice_FilenameJS+":"+ndkportaservice_ExtJS, function () {
	return gulp.src(ndkportaservice_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});


var ndkabrijardin_FilenameJS = "ndkabrijardin";
var ndkabrijardin_ExtJS      = "js";
var ndkabrijardin_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkabrijardin_FilenameJS+"."+ndkabrijardin_ExtJS;
gulp.task(ndkabrijardin_FilenameJS+":"+ndkabrijardin_ExtJS, function () {
	return gulp.src(ndkabrijardin_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkmobilierjardin_FilenameJS = "ndkmobilierjardin";
var ndkmobilierjardin_ExtJS      = "js";
var ndkmobilierjardin_StartJS    = localSrcNDKModule+"/views/js/src/ndkproduct/"+ndkmobilierjardin_FilenameJS+"."+ndkmobilierjardin_ExtJS;
gulp.task(ndkmobilierjardin_FilenameJS+":"+ndkmobilierjardin_ExtJS, function () {
	return gulp.src(ndkmobilierjardin_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/ndkproduct/"));
});

var ndkCanvas_FilenameJS = "ndkcanvas2svg";
var ndkCanvas_ExtJS      = "js";
var ndkCanvas_StartJS    = localSrcNDKModule+"/views/js/src/"+ndkCanvas_FilenameJS+"."+ndkCanvas_ExtJS;
gulp.task(ndkCanvas_FilenameJS+":"+ndkCanvas_ExtJS, function () {
	return gulp.src(ndkCanvas_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var ndkDesigner_FilenameJS = "ndkdesigner";
var ndkDesigner_ExtJS      = "js";
var ndkDesigner_StartJS    = localSrcNDKModule+"/views/js/src/"+ndkDesigner_FilenameJS+"."+ndkDesigner_ExtJS;
gulp.task(ndkDesigner_FilenameJS+":"+ndkDesigner_ExtJS, function () {
	return gulp.src(ndkDesigner_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var ndkLazy_FilenameJS = "ndklazy";
var ndkLazy_ExtJS      = "js";
var ndkLazy_StartJS    = localSrcNDKModule+"/views/js/src/"+ndkLazy_FilenameJS+"."+ndkLazy_ExtJS;
gulp.task(ndkLazy_FilenameJS+":"+ndkLazy_ExtJS, function () {
	return gulp.src(ndkLazy_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var ndkTools_FilenameJS = "ndkTools";
var ndkTools_ExtJS      = "js";
var ndkTools_StartJS    = localSrcNDKModule+"/views/js/src/"+ndkTools_FilenameJS+"."+ndkTools_ExtJS;
gulp.task(ndkTools_FilenameJS+":"+ndkTools_ExtJS, function () {
	return gulp.src(ndkTools_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var ndkOrder_FilenameJS = "order";
var ndkOrder_ExtJS      = "js";
var ndkOrder_StartJS    = localSrcNDKModule+"/views/js/src/"+ndkOrder_FilenameJS+"."+ndkOrder_ExtJS;
gulp.task(ndkOrder_FilenameJS+":"+ndkOrder_ExtJS, function () {
	return gulp.src(ndkOrder_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcNDKModule+"/views/js/"));
});

var product_FilenameJS = "product";
var product_ExtJS      = "js";
var product_StartJS    = localSrcTheme+"/js/src/"+product_FilenameJS+"."+product_ExtJS;
gulp.task(product_FilenameJS+":"+product_ExtJS, function () {
	return gulp.src(product_StartJS)
		.pipe(plumber())
		.pipe(uglify())
		.pipe(gulp.dest(localSrcTheme+"/js/"));
});


/* === AQUI A MÁGICA ACONTECE === */
gulp.task('shazam', gulp.series(
	'custom:css',
	'newAlu:css',
  'product:css',
  'catagory:css',
  'shoppingcart:css',
  'orderclient:css',
	'theme:css',
	'error:css',
	'admin:css',
	'dynamicprice:css',
	'fontselector:css',
	'front:css',
	'loader:css',
	'ndkacf:css',
	'ndkdesigner:css',
	'order:css',
	'custom:js',
	'theme:js',
	'admin:js',
	'autoresize:js',
	'dynamicprice:js',
	'fromprice:js',
	'html2canvas.ndk:js',
	'html2canvas.svg:js',
	'imagetocanvas:js',
	'imagetracer_v1.2.4:js',
	'jquery.fontselector:js',
	'jquery.lettering:js',
	'jquery.mask:js',
	'jquery.maxlength:js',
	'jquery.resize:js',
	'jquery.simulate:js',
	'ndkacf:js',
  'posndkacf:js',
	'aluclassfunction:js',
  'ndkPortail:js',
  'ndkloadgeneric:js',
  'ndkgrillagerigide:js',
  'ndkgardecorps:js',
  'ndkcloturealu:js',
  'ndkbarrierepiscine:js',
  'ndkgaragesectionnelle:js',
  'ndkgaragebattente:js',
  'ndkvoletroulant:js',
  'ndkfenetre:js',
  'ndkpvcfenetre:js',
  'ndkportedentree:js',
  'ndkverriere:js',
  'ndkpergolaaluminium:js',
  'ndkpergolabioclimatique:js',
  'ndkportaservice:js',
  'ndkabrijardin:js',
  'ndkmobilierjardin:js',
	'ndkcanvas2svg:js',
	'ndkdesigner:js',
	'ndklazy:js',
	'ndkTools:js',
	'order:js',
  'product:js'
));
