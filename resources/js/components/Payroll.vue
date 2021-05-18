<template>
<div class="h-full overflow-hidden">

	<div class="flex bg-track-2 h-10 w-full py-1 pr-1 pl-2 items-center justify-between">
		<div class="text-xl">Payroll - May 1-15, 2019</div>
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
							<p class="text-sm leading-none font-semibold truncate">Ilagan, Ediboy</p>
						</div>

						<div class="flex justify-center items-center text-center w-full sm:w-1/2">
							<div class="flex flex-col flex-1 h-full bg-track-1 border-r border-l border-track-2 p-2">
								<p class="font-semibold text-sm">10</p>
								<p>DAYS</p>
							</div>

							<div class="flex flex-col flex-1 h-full bg-track-1 border-r border-track-2 p-2">
								<p class="font-semibold text-sm">80</p>
								<p>HOURS</p>
							</div>

							<div class="flex flex-col flex-1 h-full bg-track-1 border-r border-track-2 p-2">
								<p class="font-semibold text-sm">P8,000</p>
								<p>SALARY</p>
							</div>
						</div>

						<div class="flex justify-end p-2 w-full sm:w-1/4 text-lg">
							<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-file-pdf"></i></div>
							<div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded mr-1"><i class="fas fa-list-alt"></i></div>
							<div class="flex w-24 h-8 bg-track-3 justify-center items-center rounded px-2 text-xs">PAYCHECK</div>
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
