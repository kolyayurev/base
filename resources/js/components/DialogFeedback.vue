<template>
  <el-dialog
	class="modal-dialog modal-review"
	top="10vh"
	:visible.sync="dialogVisibility"
	@close="resetForm">

	<div class="el-dialog__body-inner">
	  <div class="modal-card__img-block">
		<img src="/img/icons/ico-question.svg" :alt="title" class="modal-card__img">
	  </div>

	  <h3 class="modal-card__title">{{ title }}</h3>
	  <el-form :model="model" :rules="rules" ref="form" label-width="120px" :label-position="labelPosition" >
		  <slot name="field"></slot>

			<el-form-item label="Ф.И.О" prop="name">
				<el-input v-model="model.name" name="name"></el-input>
			</el-form-item>
			<el-form-item label="Телефон" prop="phone">
				<el-input v-model="model.phone" name="phone"></el-input>
			</el-form-item>
			<el-form-item label="E-mail" prop="email">
				<el-input v-model="model.email" name="email"></el-input>
			</el-form-item>
			<el-form-item label="Ваш отзыв" prop="body">
				<el-input type="textarea" :rows="5" v-model="model.body" name="body"></el-input>
			</el-form-item>

		  <ul class="modal-card__form">

			<li class="modal-card__item modal-card__part">
				<button class="btn btn-bg btn-modal-card"  @click.prevent="submitForm">Отправить</button>
			</li>

		  </ul>
	  </el-form>
	</div>
  </el-dialog>
</template>

<script>
import {dialog} from '../mixins/dialog'
import {validePhone} from '../validators'

export default {
	mixins: [dialog],
	props:{

	},
	data(){
		return{
			labelPosition: 'left',
			colors:['var(--accent)','var(--accent)','var(--accent)'],
			voidColor:'var(--accent)' ,
			model:{
				name:'',
				phone:'',
				email:'',
				body:'',
			},
			rules: {
				name: [
					{ required: true, message: lang.get('validation.required'), trigger: 'change' },
					{ max: 255, message: lang.get('validation.max_length_exceeded'), trigger: 'change' }
				],
				phone: [
					{ validator: validePhone,  trigger: 'change' },
				],
				email: [
					{ type: 'email', message: lang.get('validation.email'), trigger: 'change' },
				],
				body: [
					{ required: true, message: lang.get('validation.required'), trigger: 'change' },
					{ max: 1024, message: lang.get('validation.max_length_exceeded'), trigger: 'change' }
				],
			}
		}
	},
	mounted(){
		var _this = this
		$(window).on('load resize', function () {
			_this.resize();
		});
	},
	methods: {
		submitForm() {
			this.$refs.form.validate((valid) => {
			if (valid) {
				var _this = this
				let data = new FormData(this.$refs.form.$el);
				let url = _this.store_url;

				_this.baseAxios(url, data, function (response) {
						_this.closeDialog()
						_this.successMsg(lang.get('messages.review_successfully'),lang.get('messages.review_excerpt'),'/img/icons/ico-send.svg');
						_this.resetForm();
				},
				function (response) {
						_this.warningMsg(response.data.message);
				});

			} else {
				return false;
			}
			});
		},
		resetForm() {
			this.$refs.form.resetFields();
			for (var key in this.model) {
					this.model[key] = '';
			}
		},
		resize(){
			if (window.innerWidth <= 400) {
				this.labelPosition = 'top';
			}
			else{
				this.labelPosition = 'left';
			}
		}
	}
}
</script>

<style>

</style>
