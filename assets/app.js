// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import { cssFile } from './js/style/fileCss';

require( 'bootstrap' );

const $ = require('jquery');

cssFile()
