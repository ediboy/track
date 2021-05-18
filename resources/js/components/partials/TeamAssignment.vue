<template>
<div class="flex flex-no-wrap w-full overflow-x-auto">

	<div class="w-1/2 border-r border-track-4">
		<div class="rounded-tl overflow-hidden bg-track-3 relative">
			<div class="flex bg-track-3 p-2 w-full text-sm">Select Teams</div>

			<input v-model="searchTeam" class="flex flex-auto bg-track-5 appearance-none border-1 border-track-1 w-full h-8 pl-2 pr-8 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest text-xs mr-1" type="text"
			    placeholder="Search team...">

			<div class="text-xs leading-normal overflow-y-auto h-64">
				<div v-for="(team, i) in filteredTeams" class="unassigned-team flex w-full items-center border-t p-2 border-track-1 bg-track-1" @click="assignTeam(team, i)">
					<div class="text-xs">
						<p class="leading-none font-semibold mb-px opacity-75">{{ team.title }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="w-1/2">
		<div class="rounded-tr overflow-hidden bg-track-3 relative">
			<div class="flex bg-track-3 p-2 w-full text-sm">Assigned Teams</div>

			<input v-model="searchAssignedTeam" class="flex flex-auto bg-track-5 appearance-none border-1 border-track-1 w-full h-8 pl-2 pr-8 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest text-xs mr-1" type="text"
			    placeholder="Search team...">

			<div class="text-xs leading-normal overflow-y-auto h-64">
				<div v-for="(team, i) in filteredAssignedTeams" class="assigned-team flex w-full items-center border-t p-2 border-track-1 bg-track-1" @click="unassignTeam(team, i)">
					<div class="text-xs">
						<p class="leading-none font-semibold mb-px">{{ team.title }}</p>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
</template>

<script>
export default {
	props: {
		teams: {
			type: Array,
			required: true
		},
		assignedTeams: {
			type: Array,
			required: true
		}
	},

	data() {
		return {
			searchTeam: '',
			searchAssignedTeam: ''
		}
	},

	methods: {
		assignTeam(team, i) {
			this.assignedTeams.push(team);
			this.teams.splice(i, 1);
		},

		unassignTeam(team, i) {
			this.teams.push(team);
			this.assignedTeams.splice(i, 1);
		}
	},

	computed: {
		filteredTeams() {
			this.teams.filter(team => {
				return team.title.toLowerCase().includes(this.searchTeam.toLowerCase())
			});

			return this.teams.sort(this.$sortyByTitle);
		},

		filteredAssignedTeams() {
			this.assignedTeams.filter(team => {
				return team.title.toLowerCase().includes(this.searchAssignedTeam.toLowerCase())
			});

			return this.assignedTeams.sort(this.$sortyByTitle);
		}
	}
}
</script>
