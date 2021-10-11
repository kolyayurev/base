const requiredRule = [
    {
        required: true,
        message: lang.get("validation.common.required"),
        trigger: "blur",
    },
];
const nameRule = [
    {
        max: 255,
        message: lang.get("validation.common.max"),
        trigger: "change",
    },
];
const phoneRule = [
    { validator: validePhone, trigger: "blur" }
];
const emailRule = [
    {
        type: "email",
        message: lang.get("validation.common.email"),
        trigger: "blur",
    },
];
const textRule = [
    {
        max: 1024,
        message: lang.get("validation.common.max"),
        trigger: "change",
    },
]
export {
    requiredRule,nameRule,phoneRule,emailRule,textRule
}