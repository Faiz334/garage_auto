
import './styles/app.scss'


import jquery from 'jquery';
const $ = require('jquery');
global.$ = global.jQuery = $;

import { createPopper } from '@popperjs/core';

// Bootstrap JS
import 'bootstrap/dist/js/bootstrap.bundle';

// start the Stimulus application
import './bootstrap';
 
import { Tooltip, Toast, Popover } from 'bootstrap';
global.createPopper = createPopper;

// Toggle
$(document).ready(function() {
    $('.navbar-toggler').click(function() {
      $('.navbar-collapse').collapse('toggle');
    });
  });