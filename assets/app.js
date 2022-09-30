// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

require( 'bootstrap' );

const $ = require( 'jquery' );

import bsCustomFileInput from 'bs-custom-file-input';
import ajax from './js/ajax';

bsCustomFileInput.init();

ajax();

// console.log( DOM[ 'envoyerRequete' ] );
console.log( "coucou je suis le console" );
