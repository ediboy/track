<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Teams</div>
		<div class="flex">
			<div class="relative">
				<input v-model="keyword" class="flex flex-auto bg-track-3 appearance-none border-1 border-track-1 rounded w-auto h-8 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest mr-1" type="text" placeholder="Search">
			</div>
			<router-link class="team-create flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1" to="/teams/create"><i class="fas fa-plus"></i></router-link>
		</div>
	</div>

	<div class="flex flex-wrap mb-4 max-h-containerWithSubhead overflow-y-auto">
		<div v-for="team in filteredTeams" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 p-2">
			<div class="rounded overflow-hidden bg-track-3 relative">

				<div class="rounded-full flex items-center justify-center w-5 h-5 absolute top-0 right-0 m-2 text-orange-lightest">
					<router-link :to="{ name: 'teams.edit', params: {id: team.id} }"><i class="team-edit fas fa-pencil-alt text-sm"></i></router-link>
				</div>

				<div class="p-3">
					<div class="font-semibold text-lg w-5/6 mb-2 truncate">{{ team.title }}</div>
					<p class="text-xs truncate">{{ team.description }}</p>
				</div>

				<div class="mt-4 text-xs flex">
					<div class="flex flex-col w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold text-sm md:text-xl mb-2">{{ team.users_count }}</div>
						<div class="uppercase text-xs">Members</div>
					</div>

					<div class="flex flex-col w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold text-sm md:text-xl mb-2">2</div>
						<div class="uppercase text-xs">Projects</div>
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
			teams: [],
			keyword: ''
		}
	},

	methods: {
		init() {
			axios.get('/api/teams').then(response => {
					this.teams = response.data;
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		}
	},

	computed: {
		filteredTeams() {
			return this.teams.filter(team => {
				return team.title.toLowerCase().includes(this.keyword.toLowerCase())
			})
		}
	},

	mounted() {
		this.init();
	}
}
</script>
