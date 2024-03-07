const btnSkill = document.querySelector("#btn-skills");
const btnInfo = document.querySelector("#btn-info-sobre-mi");
let itemSkills = document.querySelectorAll('.relleno');

btnSkill.addEventListener('click',function(){
    document.querySelector('#info-sobre-mi').style.display = 'none';
    document.querySelector('#info-skills').style.display = 'block';

    btnInfo.classList.remove('selected');
    btnSkill.classList.add("selected");

    itemSkills[0].style.animation = 'animHtml 2s forwards';
    itemSkills[1].style.animation = 'animCss 2s forwards';
    itemSkills[2].style.animation = 'animJs 2s forwards';
    itemSkills[3].style.animation = 'animReact 2s forwards';
    itemSkills[4].style.animation = 'animBoostrap 2s forwards';
});

btnInfo.addEventListener('click',function(){
    document.querySelector('#info-sobre-mi').style.display = 'block';
    document.querySelector('#info-skills').style.display = 'none';

    btnInfo.classList.add('selected');
    btnSkill.classList.remove("selected");
});

document.querySelectorAll('.social-icon').forEach(icon => {
    icon.addEventListener('click', function() {
        icon.style.color = 'gold';
        setTimeout(function() {
            icon.style.color = '#fff';
        }, 1000); // Cambiar el color de vuelta a blanco después de 1 segundo
    });
});



