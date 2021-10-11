import * as Validators from "./validators"
import patterns from './patterns';


global.validePhone = Validators.validePhone;
global.valideEmail = Validators.valideEmail;
global.valideCyrillic = Validators.valideCyrillic;

global.patternPhone = patterns.patternPhone;
global.patternEmail = patterns.patternEmail;
