<template>
<div>

	<div class="slider p-4 pb-2">
		<img src="/uploads/banners/HOLIDAYBANNER.png" class="rounded">
	</div>

	<div class="flex flex-wrap px-2">
		<div class="w-1/4 p-2">
			<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
				<div class="bg-track-3 p-1 w-full text-xs md:text-base">ONLINE</div>

				<div class="px-2 py-4 text-xl md:text-3xl font-thin">7</div>
			</div>
		</div>

		<div class="w-1/4 p-2">
			<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
				<div class="bg-track-3 p-1 w-full text-xs md:text-base">OFFLINE</div>

				<div class="px-2 py-4 text-xl md:text-3xl font-thin">10</div>
			</div>
		</div>

		<div class="w-1/4 p-2">
			<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
				<div class="bg-track-3 p-1 w-full text-xs md:text-base">IDLE</div>

				<div class="px-2 py-4 text-xl md:text-3xl font-thin">2</div>
			</div>
		</div>

		<div class="w-1/4 p-2">
			<div class="rounded overflow-hidden bg-track-3 align-middle text-center">
				<div class="bg-track-3 p-1 w-full text-xs md:text-base">WEEKLY TASK</div>

				<div class="px-2 py-4 text-xl md:text-3xl font-thin">100/200</div>
			</div>
		</div>
	</div>


	<div class="flex flex-wrap mb-4 px-2">
		<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
			<div class="rounded overflow-hidden bg-track-3 relative">
				<div class="rounded-full bg-green flex items-center justify-center w-5 h-5 absolute top-0 left-0 m-2 shadow">
					<i class="fas fa-power-off text-green-lighter text-xs"></i>
				</div>

				<div class="rounded-full flex items-center justify-center w-5 h-5 absolute top-0 right-0 m-2">
					<i class="fas fa-pencil-alt text-sm"></i>
				</div>

				<div class="justify-center flex p-3">
					<img class="w-24 h-24 rounded-full" src="https://tailwindcss.com/img/card-top.jpg">
				</div>

				<div class="px-6 text-center">
					<div class="font-semibold text-lg mb-1">Ediboy Ilagan</div>
					<p class="text-xs">Web Developer</p>
				</div>
				<div class="mt-4 text-xs">
					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Time In</div>
						<div class="text-green-light">8:00 am</div>
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Time Out</div>
						<div class="text-red-light">8:00 am</div>
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Tasks</div>
						<div class="text-blue-light">1/5</div>
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Current Task</div>
						<div class="text-blue-light">Nothing Special</div>
					</div>
				</div>
			</div>
		</div>

		<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
			<div class="rounded overflow-hidden bg-track-3 relative">
				<div class="rounded-full bg-red flex items-center justify-center w-5 h-5 absolute top-0 left-0 m-2 shadow">
					<i class="fas fa-power-off text-red-lighter text-xs"></i>
				</div>

				<div class="rounded-full flex items-center justify-center w-5 h-5 absolute top-0 right-0 m-2">
					<i class="fas fa-pencil-alt text-sm"></i>
				</div>

				<div class="justify-center flex p-3">
					<img class="w-24 h-24 rounded-full" src="https://tailwindcss.com/img/card-top.jpg">
				</div>

				<div class="px-6 text-center">
					<div class="font-semibold text-lg mb-1">Ediboy Ilagan</div>
					<p class="text-xs">Web Developer</p>
				</div>
				<div class="mt-4 text-xs">
					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Time In</div>
						<div class="text-green-light">8:00 am</div>
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Time Out</div>
						<div class="text-red-light">8:00 am</div>
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Tasks</div>
						<div class="text-blue-light">1/5</div>
					</div>

					<div class="flex w-full justify-between items-center border-t p-2 border-track-1 bg-track-1">
						<div class="font-semibold">Current Task</div>
						<div class="text-blue-light">Nothing Special</div>
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
