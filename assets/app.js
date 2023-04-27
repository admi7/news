// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const $ = require( 'jquery' );

require( 'bootstrap' );

bsCustomFileInput.init();

import bsCustomFileInput from 'bs-custom-file-input';
import indexModule from './js/index.module';
import annonces from './js/annonces';
import allAnimations from './js/animations/anime';


// annonces();
allAnimations();
