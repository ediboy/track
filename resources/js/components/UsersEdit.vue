<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Edit User</div>
		<div class="flex">
			<router-link class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1" :to="{ name: 'users' }"><i class="fas fa-user-friends"></i></router-link>
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-calendar-alt"></i></div>
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-tasks"></i></div>
			<button class="flex w-24 h-8 bg-track-3 justify-center items-center rounded px-2 text-xs mr-1 uppercase" @click="edit()">Save</button>
			<div @click="$confirmDeletionShow(remove)" class="user-delete flex w-8 h-8 bg-track-3 justify-center items-center rounded cursor-pointer"><i class="fas fa-trash text-red-600"></i></div>
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
			userId: null,
			personalProfiles: [],
			workProfiles: [],
			otherProfiles: [],
			formData: {
				profiles: {}
			},
			formDataImages: {
				profiles: {}
			},
			msg: "Vue Image Upload and Resize Demo",
			formImage: {},
			formImageTimeout: '',
		}
	},

	methods: {
		init() {
			this.userId = this.$route.params.id;

			axios.get('/api/users/' + this.userId + '/edit').then(response => {
					this.personalProfiles = response.data.personal;
					this.workProfiles = response.data.work;
					this.otherProfiles = response.data.other;

					this.assignValues();
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		},

		assignValues() {
			for (let i in this.personalProfiles) {
				this.formData.profiles[this.personalProfiles[i].name] = this.personalProfiles[i].content;
			}

			for (let i in this.workProfiles) {
				this.formData.profiles[this.workProfiles[i].name] = this.workProfiles[i].content;
			}

			for (let i in this.otherProfiles) {
				this.formData.profiles[this.otherProfiles[i].name] = this.otherProfiles[i].content;
			}
		},

		edit() {
			axios.patch('/api/users/' + this.userId, this.formData.profiles)
				.then(response => {
					this.$responseShow(response);
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		},

		remove() {
			this.$confirmDeletionClose();

			axios.delete('/api/users/' + this.userId).then(response => {
					this.$responseShow(response);

					setTimeout(() =>
						this.$router.push({
							name: 'users'
						}), 1000);
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

		removeImage(profile) {
			profile.content = null;
		}

	},

	mounted() {
		this.init();
	}
}
</script>
