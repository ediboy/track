<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Leaves</div>
		<div class="flex">
			<input class="flex flex-auto bg-track-3 appearance-none border-1 border-track-1 rounded w-auto h-8 px-2 leading-tight focus:outline-none focus:bg-track-5 focus:border-track-6 text-orange-lightest mr-1" type="text" placeholder="Search">
			<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-plus"></i></div>
		</div>
	</div>

	<div class="flex flex-no-wrap mb-4 h-full w-full">
		<div class="flex-none w-full py-2">
			<div class="rounded overflow-hidden relative flex flex-col max-h-taskContainer">
				<div class="max-h-taskList text-xs leading-normal overflow-y-auto">

					<div class="bg-track-3 rounded-sm mx-2 mb-2 flex flex-col sm:flex-row items-center justify-between">
						<div class="flex items-center p-2 w-full sm:w-1/4">
							<img class="w-8 h-8 rounded-full mr-2" src="https://tailwindcss.com/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">
							<div class="text-xs">
								<p class="leading-none font-semibold mb-px">Ilagan, Ediboy</p>
								<p>Magkakasakit</p>
							</div>
						</div>

						<div class="flex flex-1 justify-center items-center text-center w-full sm:w-auto">
							<div class="flex flex-col flex-1 bg-track-1 border-r border-l border-track-2 px-2 py-4">
								<p class="font-semibold text-sm whitespace-no-wrap">Sick Leave</p>
							</div>

							<div class="flex flex-col flex-1 bg-track-1 border-r border-l border-track-2 px-2 py-4">
								<p class="font-semibold text-sm whitespace-no-wrap">Mar 23, 2019</p>
							</div>

						</div>

						<div class="flex justify-end p-2 w-full sm:w-auto text-lg">
							<div class="flex w-24 h-8 bg-track-3 justify-center items-center rounded px-2 text-xs mr-1">PENDING</div>
							<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-eye"></i></div>
							<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-pen"></i></div>
							<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded"><i class="fas fa-trash"></i></div>
						</div>
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
