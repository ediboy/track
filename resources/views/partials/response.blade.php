<Transition name="fade">
	<div v-if="response.show" class="response fixed inset-0 w-full h-screen flex items-center justify-center bg-track-6 z-50" @click.self="$responseClose">
		<div v-if="response.type === 'success'" class="relative w-full max-w-2xl bg-white shadow-lg rounded-lg">
			<div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
				Success
			</div>

			<div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
				<p>@{{ response.successMessage }}</p>
			</div>

			<button aria-label="close" class="response-close absolute top-0 right-0 text-xl text-white my-1 mx-4" @click.prevent="$responseClose">×</button>
		</div>

		<div v-if="response.type === 'error'" class="relative w-full max-w-2xl bg-white shadow-lg rounded-lg">
			<div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
				Error
			</div>

			<div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
				<ul v-if="response.status === 422" class="list-disc ml-5">
					<li v-for="(value, key, index) in response.errors">@{{ value[0] }}</li>
				</ul>

				<p v-else>Something went wrong (@{{ response.status }})</p>
			</div>

			<button aria-label="close" class="response-close absolute top-0 right-0 text-xl text-white my-1 mx-4" @click.prevent="$responseClose">×</button>
		</div>

	</div>
</Transition>
