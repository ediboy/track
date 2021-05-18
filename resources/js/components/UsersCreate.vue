<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Create User</div>
		<div class="flex">
			<router-link class="user-list flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1" :to="{ name: 'users' }"><i class="fas fa-user-friends"></i></router-link>
			<button class="flex w-24 h-8 bg-track-3 justify-center items-center rounded px-2 text-xs uppercase" @click="create()">Create</button>
		</div>
	</div>

	<div class="max-h-containerWithSubhead overflow-y-auto">
		<form>
			<div class="flex flex-wrap">
				<div class="w-full sm:w-1/3 p-2">
					<div class="rounded bg-track-3 align-middle text-center">
						<div class="bg-track-3 p-1 w-full text-xs md:text-base">Personal Details</div>

						<div class="text-xs">

							<div v-for="(profile, index) in personalProfiles" class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
								<div class="font-semibold">{{ profile.name }}</div>

								<template v-if="profile.type == 'image'">
									<div class="justify-center flex">
										<croppa :name="profile.name" v-model="formDataImages.profiles[profile.name]" :width="100" :height="100" :quality="5" :placeholder-font-size="10" :placeholder-color="'#fff'" :canvas-color="'#703B35'" :remove-button-color="'#aa5353'"
										    :remove-button-size="20" :prevent-white-space="true" @draw="saveCroppedImage(profile.name)"></croppa>
									</div>
								</template>

								<template v-if="profile.type == 'text'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'text-copy'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'email'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="email" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'textarea'">
									<textarea class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-16 p-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" :name="profile.name" v-model="formData.profiles[profile.name]"></textarea>
								</template>

								<template v-if="profile.type == 'select'">
									<div class="relative  w-1/2">
										<select class="block w-full bg-track-3 border-1 border-track-1 w-1/2 h-6 px-2 rounded leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" :name="profile.name" v-model="formData.profiles[profile.name]">
											<option v-for="value in profile.value" :value="value">{{ value }}</option>
										</select>
									</div>
								</template>

								<template v-if="profile.type == 'date'">
									<div class="relative  w-1/2">
										<datetime :name="profile.name" v-model="formData.profiles[profile.name]"></datetime>
									</div>
								</template>

							</div>

						</div>
					</div>
				</div>

				<div class="w-full sm:w-1/3 p-2">
					<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
						<div class="bg-track-3 p-1 w-full text-xs md:text-base">Work Details</div>

						<div class="text-xs">

							<div v-for="profile in workProfiles" class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
								<div class="font-semibold">{{ profile.name }}</div>

								<template v-if="profile.type == 'image'">
									<div class="justify-center flex">
										<croppa :name="profile.name" v-model="formDataImages.profiles[profile.name]" :width="100" :height="100" :quality="5" :placeholder-font-size="10" :placeholder-color="'#fff'" :canvas-color="'#703B35'" :remove-button-color="'#aa5353'"
										    :remove-button-size="20" :prevent-white-space="true" @draw="saveCroppedImage(profile.name)"></croppa>
									</div>
								</template>

								<template v-if="profile.type == 'text'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'text-copy'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'email'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="email" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'textarea'">
									<textarea class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-16 p-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" :name="profile.name" v-model="formData.profiles[profile.name]"></textarea>
								</template>

								<template v-if="profile.type == 'select'">
									<div class="relative  w-1/2">
										<select class="block w-full bg-track-3 border-1 border-track-1 w-1/2 h-6 px-2 rounded leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" :name="profile.name" v-model="formData.profiles[profile.name]">
											<option v-for="value in profile.value" :value="value">{{ value }}</option>
										</select>
									</div>
								</template>

								<template v-if="profile.type == 'date'">
									<div class="relative  w-1/2">
										<datetime :name="profile.name" v-model="formData.profiles[profile.name]"></datetime>
									</div>
								</template>

							</div>

						</div>
					</div>
				</div>

				<div class="w-full sm:w-1/3 p-2">
					<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
						<div class="bg-track-3 p-1 w-full text-xs md:text-base">Other Details</div>

						<div class="text-xs">

							<div v-for="profile in otherProfiles" class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
								<div class="font-semibold">{{ profile.name }}</div>

								<template v-if="profile.type == 'image'">
									<div class="justify-center flex">
										<croppa :name="profile.name" v-model="formDataImages.profiles[profile.name]" :width="100" :height="100" :quality="5" :placeholder-font-size="10" :placeholder-color="'#fff'" :canvas-color="'#703B35'" :remove-button-color="'#aa5353'"
										    :remove-button-size="20" :prevent-white-space="true" @draw="saveCroppedImage(profile.name)"></croppa>
									</div>
								</template>

								<template v-if="profile.type == 'text'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'text-copy'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'email'">
									<input class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="email" :name="profile.name" v-model="formData.profiles[profile.name]">
								</template>

								<template v-if="profile.type == 'textarea'">
									<textarea class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-16 p-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" :name="profile.name" v-model="formData.profiles[profile.name]"></textarea>
								</template>

								<template v-if="profile.type == 'select'">
									<div class="relative  w-1/2">
										<select class="block w-full bg-track-3 border-1 border-track-1 w-1/2 h-6 px-2 rounded leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" :name="profile.name" v-model="formData.profiles[profile.name]">
											<option v-for="value in profile.value" :value="value">{{ value }}</option>
										</select>
									</div>
								</template>

								<template v-if="profile.type == 'date'">
									<div class="relative  w-1/2">
										<datetime :name="profile.name" v-model="formData.profiles[profile.name]"></datetime>
									</div>
								</template>

							</div>

						</div>
					</div>

				</div>
			</div>
		</form>
	</div>

</div>
</template>

<script>
import 'vue-croppa/dist/vue-croppa.css';

export default {

	data() {
		return {
			personalProfiles: [],
			workProfiles: [],
			otherProfiles: [],
			formData: {
				profiles: {}
			},
			formDataImages: {
				profiles: {}
			},
			formImage: {},
			formImageTimeout: ''
		}
	},

	methods: {
		init() {
			axios.get('/api/users/create').then(response => {
					this.personalProfiles = response.data.personal;
					this.workProfiles = response.data.work;
					this.otherProfiles = response.data.other;
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		},

		create() {
			axios.post('/api/users', this.formData.profiles)
				.then(response => {
					this.$responseShow(response);
					this.formData.profiles = {};
					this.removeFormImages();
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		},

		saveCroppedImage(model) {
			let vm = this;

			clearTimeout(this.formImageTimeout);

			this.formImageTimeout = setTimeout(function() {
				vm.formData.profiles[model] = vm.formDataImages.profiles[model].generateDataUrl();
			}, 1000);

		},

		removeFormImages() {
			for (let image in this.formDataImages.profiles) {
				this.formDataImages.profiles[image].remove();
			}

			this.formDataImages.profiles = {}
		}

	},

	mounted() {
		this.init();
	}
}
</script>
