export function validePhone  (rule, value, callback)  {
    const reg = /^(\+?\d{3,12}|)$/g;
    if(!reg.test(value)) {
        callback(new Error($t('validation.phone')));
    }
    callback();
};


