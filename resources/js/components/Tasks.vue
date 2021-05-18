<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Tasks</div>
		<div class="flex">
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-plus"></i></div>
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded"><i class="fas fa-history"></i></div>
		</div>
	</div>

	<div class="flex flex-no-wrap mb-4 h-full w-full">
		<div class="flex-none w-full py-1">
			<div class="rounded overflow-hidden relative flex flex-col max-h-taskContainer">

				<div class="max-h-taskList text-xs leading-normal overflow-y-auto">

					<div class="bg-track-3 rounded-sm p-2 mx-2 my-1">
						<div class="flex mb-3 justify-between">
							<div class="bg-green-500 rounded px-2">develop</div>
							<div class="bg-purple-600 rounded px-2">not started</div>
						</div>
						<div><strong>Genie:</strong> Create Project UI</div>
					</div>

					<div class="bg-track-3 rounded-sm p-2 mx-2 my-1">
						<div class="flex mb-3 justify-between">
							<div class="bg-blue-600 rounded px-2">review</div>
							<div class="bg-purple-600 rounded px-2">started</div>
						</div>
						<div><strong>Genie:</strong> Create Project UI</div>
					</div>

					<div class="bg-track-3 rounded-sm p-2 mx-2 my-1">
						<div class="flex mb-3 justify-between">
							<div class="bg-pink-600 rounded px-2">qa</div>
							<div class="bg-purple-600 rounded px-2">not started</div>
						</div>
						<div><strong>Genie:</strong> Create Project UI</div>
					</div>

				</div>

			</div>
		</div>

	</div>

</div>
</template>

<script>
export default {}
</script>
