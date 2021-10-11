import patterns from './patterns';


function validePhone  (rule, value, callback)  {
    const reg = patterns.patternPhone;
    if(!reg.test(value)) {
        callback(new Error(lang.get('validation.common.phone')));
    }
    callback();
};
function valideEmail  (rule, value, callback)  {
    const reg = patterns.patternEmail;
    if(!reg.test(value)) {
        callback(new Error(lang.get('validation.common.email')));
    }
    callback();
};

function valideCyrillic  (rule, value, callback)  {
    const reg = /^[а-яёА-ЯЁ\s]*$/g;
    if(!reg.test(value)) {
        callback(new Error(lang.get('validation.common.cyrillic')));
    }
    callback();
}


export {
    validePhone,
    valideEmail,
    valideCyrillic,
}



