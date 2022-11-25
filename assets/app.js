// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

require( 'bootstrap' );

const $ = require( 'jquery' );

import bsCustomFileInput from 'bs-custom-file-input';
import indexModule from './js/index.module';

bsCustomFileInput.init();

const Im = indexModule();
console.log( Im );
console.log( 'Im' );

// console.log( DOM[ 'envoyerRequete' ] );
console.log( "coucou je suis le console" );
