<Transition name="fade">
	<div v-if="confirmDeletion.show" class="fixed inset-0 w-full h-screen flex items-center justify-center bg-track-6 z-50" @click.self="$confirmDeletionClose">
		<div class="relative w-full max-w-sm bg-white shadow-lg rounded-lg">
			<div class="bg-orange-500 text-white font-bold rounded-t px-4 py-2">
				Are you sure you want to delete?
			</div>

			<div class="border border-t-0 border-orange-400 rounded-b bg-orange-100 px-4 py-3 text-orange-700 flex flex-row-reverse">
				<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click.prevent="$confirmDelete">
  					Delete
				</button>

				<button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" @click.prevent="$confirmDeletionClose">
  					Cancel
				</button>
			</div>

			<button aria-label="close" class="absolute top-0 right-0 text-xl text-white my-1 mx-4" @click.prevent="$confirmDeletionClose">×</button>
		</div>
	</div>
</Transition>
