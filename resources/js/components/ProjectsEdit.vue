<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Edit Project</div>
		<div class="flex">
			<button class="flex w-24 h-8 bg-track-3 justify-center items-center rounded px-2 text-xs mr-1 uppercase" @click="edit()">Save</button>
			<div @click="$confirmDeletionShow(remove)" class="team-delete flex w-8 h-8 bg-track-3 justify-center items-center rounded cursor-pointer"><i class="fas fa-trash text-red-600"></i></div>
		</div>
	</div>

	<div class="max-h-containerWithSubhead overflow-y-auto">

		<div class="w-full sm:w-1/2 p-2">
			<div class="rounded overflow-hidden bg-track-3 relative">
				<div class="bg-track-3 p-2 w-full text-sm">Project Details</div>

				<div class="text-xs leading-normal overflow-y-auto">

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Title</div>
						<input v-model="project.title" name="title" class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-6 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest" type="text">
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Description</div>
						<textarea v-model="project.description" name="description" class="flex bg-track-3 appearance-none border-1 border-track-1 rounded w-1/2 h-16 p-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest"></textarea>
					</div>

				</div>
			</div>
		</div>

		<div class="px-2 mb-2">
			<UserAssignment :users="users" :assignedUsers="assignedUsers" />
		</div>

		<div class="px-2">
			<TeamAssignment :teams="teams" :assignedTeams="assignedTeams" />
		</div>

	</div>

</div>
</template>

<script>
import UserAssignment from './partials/UserAssignment';
import TeamAssignment from './partials/TeamAssignment';

export default {
	components: {
		UserAssignment,
		TeamAssignment
	},

	data() {
		return {
			projectId: null,
			project: {
				id: null,
				title: null,
				description: null,
				users: [],
				teams: [],
			},
			users: [],
			assignedUsers: [],
			teams: [],
			assignedTeams: [],
		}
	},

	methods: {
		init() {
			this.projectId = this.$route.params.id;

			axios.get('/api/projects/' + this.projectId + '/edit').then(response => {
					this.project = response.data.project;
					this.users = response.data.users;
					this.assignedUsers = response.data.assignedUsers;
					this.teams = response.data.teams;
					this.assignedTeams = response.data.assignedTeams;
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		},

		edit() {
			this.project.users = this.$pluck(this.assignedUsers, 'id');
			this.project.teams = this.$pluck(this.assignedTeams, 'id');

			axios.patch('/api/projects/' + this.projectId, this.project)
				.then(response => {
					this.$responseShow(response);
					this.$router.push({
						name: 'projects'
					});
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		},

		remove() {
			this.$confirmDeletionClose();

			axios.delete('/api/projects/' + this.projectId).then(response => {
					this.$responseShow(response);

					setTimeout(() =>
						this.$router.push({
							name: 'projects'
						}), 1000);
				})
				.catch(error => {
					this.$responseShow(error.response);
				});
		}
	},

	mounted() {
		this.init();
	}
}
</script>
