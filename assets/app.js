
import './styles/app.scss'

import 'bootstrap';

 
import { Tooltip, Toast, Popover } from 'bootstrap';
import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';

//import Filter from './assets/Filter'

// Toggle
document.addEventListener('DOMContentLoaded', function() {
  var navbarToggler = document.querySelector('.navbar-toggler');
  var navbarCollapse = document.querySelector('.navbar-collapse');

  navbarToggler.addEventListener('click', function() {
      // Ajoute ou supprime la classe 'show' pour afficher ou masquer le menu
      navbarCollapse.classList.toggle('show');
  });
});




$(document).ready(function() {
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();

        var formData = $(this).serializeArray();

        $.ajax({
            type: 'POST',
            url: '{{ path("app_vehicle_filter") }}',
            data: JSON.stringify(formData),
            contentType: 'application/json',
            success: function(response) {
                // Mettre à jour la liste des véhicules avec les résultats filtrés
                // Assurez-vous d'adapter cette partie à votre structure HTML
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
