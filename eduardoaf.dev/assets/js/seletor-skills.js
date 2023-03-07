let skills      = document.querySelectorAll('.skills__item');
let tiposSkill  = document.querySelectorAll('.skills__skill');

function filtraSkills(tipo){
    skills.forEach(skill => {
        if(skill.classList.contains(`skills__item--${tipo}`)){
            skill.classList.remove('skills__item--escondido')
        }
        
        if(!skill.classList.contains(`skills__item--${tipo}`)){
            skill.classList.add('skills__item--escondido')
        }

        if(tipo == 'all'){
            skill.classList.remove('skills__item--escondido')
        }
    });
}

function skillAtiva(nome){
    tiposSkill.forEach(el => {
        el.classList.remove('skills__skill--ativo');
        if(el.classList.contains(`skills__skill--${nome}`)){
            el.classList.add('skills__skill--ativo');
        }
    });
}

tiposSkill.forEach(tipoSkill => {
    tipoSkill.addEventListener('click', () =>{
        if(tipoSkill.classList.contains('skills__skill--all')){
            tipo = 'all'
            skills.forEach(skill => {
                skill.classList.remove('skills__item--escondido');
            });
        }
        
        if(tipoSkill.classList.contains('skills__skill--codigo')){
            tipo = 'codigo';
        }
        if(tipoSkill.classList.contains('skills__skill--dba')){
            tipo = 'dba';
        }
        if(tipoSkill.classList.contains('skills__skill--outro')){
            tipo = 'outro';
        }
        filtraSkills(tipo);
        skillAtiva(tipo);
    });
});
