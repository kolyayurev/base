


export const messages = {
  data(){
    return{
      successMsgTitle: lang.get('common.messages.success'),
      warningMsgTitle:lang.get('common.messages.warning'),
      errorMsgTitle:lang.get('common.messages.error'),
    }
  },
  methods: {
    successMsg(title=this.successMsgTitle,msg='',icon="",duration = 3000){
      this.$alert(
        `<div class="modal-notification__img-block"> <img src="${icon}" alt="${title}" class="modal-notification__img"></div><h3 class="modal-notification__title">${title}</h3><p class="modal-notification__excerpt">${msg}</p>`, {
        dangerouslyUseHTMLString: true,
        customClass: 'modal-notification__inner',
        closeOnPressEscape: true,
        closeOnClickModal: true,
        closeOnHashChange: true,
        showConfirmButton: false,
        center:true,
        callback: () => {},
      });
      setTimeout(() => {
        window.location.hash = Date.now() + '' + Math.random()
      }, duration)
    },
    warningMsg(title=this.warningMsgTitle,msg='',duration = 2000,offset=50){
      this.msg(title,msg,'warning',duration,offset);
    },
    errorMsg(title=this.errorMsgTitle,msg='',duration = 10000,offset=50){
        this.msg(title,msg,'error',duration,offset);
    },
    msg(title='',msg='',type = 'info',duration = 2000,offset=0){
      this.$notify({
        title: title,
        message:  msg,
        type: type,
        duration: duration,
        offset: offset,
        onClick(){
          this.close()
        }
      })
    },
    
  },
}
