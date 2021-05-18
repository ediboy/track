<template>
<div class="flex flex-no-wrap w-full overflow-x-auto">

	<div class="w-1/2 border-r border-track-4">
		<div class="rounded-tl overflow-hidden bg-track-3 relative">
			<div class="flex bg-track-3 p-2 w-full text-sm">Select Users</div>

			<input v-model="searchUser" class="flex flex-auto bg-track-5 appearance-none border-1 border-track-1 w-full h-8 pl-2 pr-8 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest text-xs mr-1" type="text"
			    placeholder="Search user...">

			<div class="text-xs leading-normal overflow-y-auto h-64">
				<div v-for="(user, i) in filteredUsers" class="unassigned-user flex w-full items-center border-t p-2 border-track-1 bg-track-1" @click="assignUser(user, i)">
					<img class="w-8 h-8 rounded-full mr-2 black-and-white" :src="user.profile_picture">
					<div class="text-xs">
						<p class="leading-none font-semibold mb-px opacity-75">{{ user.name }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="w-1/2">
		<div class="rounded-tr overflow-hidden bg-track-3 relative">
			<div class="flex bg-track-3 p-2 w-full text-sm">Assigned Users</div>

			<input v-model="searchAssignedUser" class="flex flex-auto bg-track-5 appearance-none border-1 border-track-1 w-full h-8 pl-2 pr-8 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest text-xs mr-1" type="text"
			    placeholder="Search user...">

			<div class="text-xs leading-normal overflow-y-auto h-64">
				<div v-for="(user, i) in filteredAssignedUsers" class="assigned-user flex w-full items-center border-t p-2 border-track-1 bg-track-1" @click="unassignUser(user, i)">
					<img class="w-8 h-8 rounded-full mr-2" :src="user.profile_picture">
					<div class="text-xs">
						<p class="leading-none font-semibold mb-px">{{ user.name }}</p>
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
		users: {
			type: Array,
			required: true
		},
		assignedUsers: {
			type: Array,
			required: true
		}
	},

	data() {
		return {
			searchUser: '',
			searchAssignedUser: ''
		}
	},

	methods: {
		assignUser(user, i) {
			this.assignedUsers.push(user);
			this.users.splice(i, 1);
		},

		unassignUser(user, i) {
			this.users.push(user);
			this.assignedUsers.splice(i, 1);
		}
	},

	computed: {
		filteredUsers() {
			this.users.filter(user => {
				return user.name.toLowerCase().includes(this.searchUser.toLowerCase())
			});

			return this.users.sort(this.$sortyByName);
		},

		filteredAssignedUsers() {
			this.assignedUsers.filter(user => {
				return user.name.toLowerCase().includes(this.searchAssignedUser.toLowerCase())
			});

			return this.assignedUsers.sort(this.$sortyByName);
		}
	}
}
</script>
