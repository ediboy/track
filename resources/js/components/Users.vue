<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Users</div>
		<div class="flex">
			<input v-model="keyword" class="flex flex-auto bg-track-3 appearance-none border-1 border-track-1 rounded w-auto h-8 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest mr-1" type="text" placeholder="Search">
			<router-link class="user-create flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1" to="/users/create"><i class="fas fa-plus"></i></router-link>
		</div>
	</div>

	<div class="flex flex-no-wrap mb-2 max-h-containerWithSubhead overflow-y-auto">
		<div class="flex-none w-full py-1">

			<div v-for="user in filteredUsers" class="rounded overflow-hidden relative flex flex-col">

				<div class="text-xs leading-normal overflow-y-auto">

					<div class="bg-track-3 rounded-sm p-2 mx-2 my-1 flex items-center justify-between">
						<div class="flex items-center">
							<img class="w-8 h-8 rounded-full mr-2" :src="user.profile_picture">
							<div class="text-xs">
								<p class="leading-none font-semibold mb-px">{{ user.name }}</p>
								<p>{{ user.employee_number }}</p>
							</div>
						</div>

						<div class="flex text-lg">
							<router-link class="user-view flex w-8 h-8 bg-track-3 justify-center items-center rounded mr-1" :to="{ name: 'users.show', params: {id: user.id} }"><i class="fas fa-eye"></i></router-link>
							<router-link class="user-edit flex w-8 h-8 bg-track-3 justify-center items-center rounded mr-1" :to="{ name: 'users.edit', params: {id: user.id} }"><i class="fas fa-pen"></i></router-link>
							<div class="delete flex w-8 h-8 bg-track-3 justify-center items-center rounded mr-1"><i class="fas fa-calendar-alt"></i></div>
						</div>
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
			users: [],
			keyword: '',
		}
	},

	methods: {
		init() {
			axios.get('/api/users').then(response => {
					this.users = response.data;
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		}
	},

	computed: {
		filteredUsers() {
			return this.users.filter(user => {
				return user.name.toLowerCase().includes(this.keyword.toLowerCase())
			})
		}
	},

	mounted() {
		this.init();
	}
}
</script>
