$(() => {
	evaluationTable()

	chartOne()
	chartTwo()
	chartThree()
	chartFour()
})

chartOne = () => {
	var chartNumberOne = document.getElementById('chartNumberOne')

	$.ajax({
		type: 'GET',
		cache: false,
		url:
			apiURL +
			'odrs/pup_staff/evaluation_analytics/number_of_evaluations_for_this_user_for_the_current_year',
		dataType: 'json',
		headers: AJAX_HEADERS,
	}).then((result) => {
		const data = result.data

		const numberOfEvaluations = parseInt(data[0].count)
		const htmlContent = `<div class="number"><h1 class="display-1 text-primary">${numberOfEvaluations}</h1></div><p class="fs-5 text-center font-italic">Number of Evaluations Done in 2023</p>`

		chartNumberOne.innerHTML = htmlContent
	})
}

chartTwo = () => {
	var chartNumberTwo = document.getElementById('chartNumberTwo')

	$.ajax({
		type: 'GET',
		cache: false,
		url: apiURL + 'odrs/pup_staff/evaluation_analytics/total_average_rating',
		dataType: 'json',
		headers: AJAX_HEADERS,
	}).then((result) => {
		const data = result.data

		const averageRatingFormat = parseFloat(data[0].average_rating_overall).toFixed(3)
		const avgRatingOverall = isNaN(averageRatingFormat) ? 0 : averageRatingFormat
		const htmlContent = `<div class="number"><h1 class="display-1 text-primary">${avgRatingOverall}</h1></div><p class="fs-5 text-center font-italic">Average Overall Rating for 2023</p>`

		chartNumberTwo.innerHTML = htmlContent
	})
}

chartThree = () => {
	var chartNumberThree = echarts.init(document.getElementById('chartNumberThree'))

	$.ajax({
		type: 'GET',
		cache: false,
		url: apiURL + 'odrs/pup_staff/evaluation_analytics/number_of_evaluated_requests',
		dataType: 'json',
		headers: AJAX_HEADERS,
	}).then((result) => {
		const data = result.data

		// Map the month numbers to month names
		var monthNames = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December',
		]

		var option = {
			toolbox: {
				show: true,
				feature: {
					saveAsImage: {
						show: true,
						title: 'Save as Image',
						name: `(myPUPQC-ODRTS) chartThree_${new Date()
							.toISOString()
							.slice(0, 10)}_number_of_evaluated_appointments`,
					},
				},
			},
			xAxis: {
				type: 'category',
				data: data.map(function (item) {
					return monthNames[item.month - 1]
				}),
			},
			yAxis: {
				type: 'value',
			},
			series: [
				{
					type: 'bar',
					data: data.map(function (item) {
						return parseInt(item.number_of_evaluated_appointments)
					}),
				},
			],
		}

		chartNumberThree.setOption(option)
	})
}

chartFour = () => {
	var chartNumberFour = echarts.init(document.getElementById('chartNumberFour'))

	$.ajax({
		type: 'GET',
		cache: false,
		url: apiURL + 'odrs/pup_staff/evaluation_analytics/average_rating_of_evaluated_requests',
		dataType: 'json',
		headers: AJAX_HEADERS,
	}).then((result) => {
		const data = result.data

		// Map the month numbers to month names
		var monthNames = [
			'January',
			'February',
			'March',
			'April',
			'May',
			'June',
			'July',
			'August',
			'September',
			'October',
			'November',
			'December',
		]

		var chartData = data.map(function (item) {
			return {
				value: parseFloat(item.average_rating),
				name: monthNames[item.month - 1],
			}
		})

		// Create the options object for the chart
		var option = {
			toolbox: {
				show: true,
				feature: {
					saveAsImage: {
						show: true,
						title: 'Save as Image',
						name: `(myPUPQC-ODRTS) chartFour_${new Date()
							.toISOString()
							.slice(0, 10)}_average_rating_of_evaluated_appointments`,
					},
				},
			},
			xAxis: {
				type: 'category',
				data: chartData.map(function (item) {
					return item.name
				}),
			},
			yAxis: {
				type: 'value',
			},
			tooltip: {
				trigger: 'axis',
			},
			series: [
				{
					type: 'line', // Use line chart instead of bar chart
					data: chartData.map(function (item) {
						return item.value
					}),
				},
			],
		}

		chartNumberFour.setOption(option)
	})
}
