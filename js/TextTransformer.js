// show hidden fields in HTML dynamically
function showFields () {

    let elements = document.querySelectorAll('.extra-field');

    for (let i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
    }

  let option = document.getElementById('functionSelect').value;

  switch (option) {
        case 'str_pad':
            document.getElementById('padFields').style.display = 'block';
            break;
        case 'str_replace':
            document.getElementById('replaceFields').style.display = 'block';
            break;
        case 'strcmp':
            document.getElementById('compareField').style.display = 'block';
            break;
        case 'strpos':
            document.getElementById('positionField').style.display = 'block';
            break;
        case 'substr':
            document.getElementById('substrField').style.display = 'block';
            break;
        case 'implode':
            document.getElementById('implodeField').style.display = 'block';
            break;
        case 'explode':
            document.getElementById('explodeField').style.display = 'block';
            break;
        default:
            break;
    }

}

// enable input only for selected operation. Other inputs will be disable.
document.addEventListener('DOMContentLoaded', function () {
  
 
    const form = document.querySelector('form');
    form.addEventListener('submit', function () { 
 
        document.querySelectorAll('.extra-field').forEach(div => {
            if (div.style.display === 'none'){
                div.querySelectorAll('input').forEach(input => input.disabled = true);
            } else {
                div.querySelectorAll('input').forEach(input => input.disabled = false);
            }
        });
    });
});



