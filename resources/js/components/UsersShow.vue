<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">User - {{ user.name }}</div>
		<div class="flex">
			<router-link class="user-list flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1" :to="{ name: 'users' }"><i class="fas fa-user-friends"></i></router-link>
			<router-link class="user-edit flex w-8 h-8 bg-track-3 justify-center items-center rounded mr-1" :to="{ name: 'users.edit', params: {id: $route.params.id} }"><i class="fas fa-pen"></i></router-link>
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-calendar-alt"></i></div>
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-tasks"></i></div>
		</div>
	</div>

	<div class="max-h-containerWithSubhead overflow-y-auto">
		<div class="flex flex-wrap">
			<div class="w-full p-2">
				<div class="rounded overflow-hidden bg-track-3 relative">
					<div class="rounded-full bg-green flex items-center justify-center w-5 h-5 absolute top-0 left-0 m-2 shadow">
						<i class="fas fa-power-off text-green-lighter text-xs"></i>
					</div>

					<div class="justify-center flex p-3">
						<img class="w-24 h-24 rounded-full" :src="user.profile_picture">
					</div>

					<div class="px-6 text-center">
						<div class="font-semibold text-lg mb-1">{{ user.name }}</div>
						<p class="text-xs">{{ user.position }}</p>
					</div>

					<div class="mt-4 text-xs">
						<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
							<div class="font-semibold">Time In</div>
							<div class="text-green-light">8:00 am</div>
						</div>

						<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
							<div class="font-semibold">Time Out</div>
							<div class="text-red-light">8:00 am</div>
						</div>

						<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
							<div class="font-semibold">All Tasks</div>
							<div class="text-blue-light">100/500</div>
						</div>

						<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
							<div class="font-semibold">Current Task</div>
							<div class="text-blue-light">Nothing Special</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="flex flex-wrap mb-4">
			<div class="w-full sm:w-1/3 p-2 pt-0">
				<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
					<div class="bg-track-3 p-1 w-full text-xs md:text-base">Personal Details</div>

					<div class="text-xs" v-for="(profile, index) in user.personal">
						<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
							<div class="font-semibold">{{ profile.name }}</div>
							<div>{{ profile.value }}</div>
						</div>
					</div>

				</div>
			</div>

			<div class="w-full sm:w-1/3 p-2 pt-0">
				<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
					<div class="bg-track-3 p-1 w-full text-xs md:text-base">Work Details</div>

					<div class="text-xs">
						<div class="text-xs" v-for="(profile, index) in user.work">
							<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
								<div class="font-semibold">{{ profile.name }}</div>
								<div>{{ profile.value }}</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="w-full sm:w-1/3 p-2 pt-0">
				<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
					<div class="bg-track-3 p-1 w-full text-xs md:text-base">Other Details</div>

					<div class="text-xs">
						<div class="text-xs" v-for="(profile, index) in user.other">
							<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
								<div class="font-semibold">{{ profile.name }}</div>
								<div>{{ profile.value }}</div>
							</div>
						</div>

						<!-- <div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
							<div class="font-semibold">BDO Account Number</div>
							<div class="flex items-center">
								<div>123123123</div>
								<div class="flex w-6 h-6 bg-track-3 text-green-lightest justify-center items-center rounded ml-1"><i class="fas fa-copy"></i></div>
							</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</template>

<script>
export default {
	data() {
		return {
			user: {}
		}
	},

	methods: {
		loadEmployee() {

			let id = this.$route.params.id;

			axios.get('/api/users/' + id).then(response => {
					this.user = response.data;
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		}
	},

	mounted() {
		this.loadEmployee();
	}
}
</script>
