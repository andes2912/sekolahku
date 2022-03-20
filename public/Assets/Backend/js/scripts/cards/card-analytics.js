/*=========================================================================================
    File Name: card-analytics.js
    Description: Card Analytics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on('load', function () {
  'use strict';

  var $textHeadingColor = '#5e5873';
  var $strokeColor = '#ebe9f1';
  var $labelColor = '#e7eef7';
  var $avgSessionStrokeColor2 = '#ebf0f7';
  var $budgetStrokeColor2 = '#dcdae3';
  var $goalStrokeColor2 = '#51e5a8';
  var $revenueStrokeColor2 = '#d0ccff';
  var $textMutedColor = '#b9b9c3';
  var $salesStrokeColor2 = '#df87f2';
  var $white = '#fff';
  var $earningsStrokeColor2 = '#28c76f66';
  var $earningsStrokeColor3 = '#28c76f33';

  var supportChartOptions;
  var avgSessionChartOptions;
  var revenueReportChartOptions;
  var budgetChartOptions;
  var goalChartOptions;
  var revenueChartOptions;
  var salesChartOptions;
  var salesLineChartOptions;
  var sessionChartOptions;
  var customerChartOptions;
  var orderChartOptions;
  var earningsChartOptions;

  var supportChart;
  var avgSessionChart;
  var revenueReportChart;
  var budgetChart;
  var goalChart;
  var revenueChart;
  var salesChart;
  var salesLineChart;
  var sessionChart;
  var customerChart;
  var orderChart;
  var earningsChart;

  var $supportTrackerChart = document.querySelector('#support-tracker-chart');
  var $avgSessionChart = document.querySelector('#avg-session-chart');
  var $revenueReportChart = document.querySelector('#revenue-report-chart');
  var $budgetChart = document.querySelector('#budget-chart');
  var $goalOverviewChart = document.querySelector('#goal-overview-chart');
  var $revenueChart = document.querySelector('#revenue-chart');
  var $salesChart = document.querySelector('#sales-chart');
  var $salesLineChart = document.querySelector('#sales-line-chart');
  var $sessionChart = document.querySelector('#session-chart');
  var $customerChart = document.querySelector('#customer-chart');
  var $productOrderChart = document.querySelector('#product-order-chart');
  var $earningsChart = document.querySelector('#earnings-donut-chart');

  // Support Tracker Chart
  // -----------------------------
  supportChartOptions = {
    chart: {
      height: 270,
      type: 'radialBar'
    },
    plotOptions: {
      radialBar: {
        size: 150,
        offsetY: 20,
        startAngle: -150,
        endAngle: 150,
        hollow: {
          size: '65%'
        },
        track: {
          background: $white,
          strokeWidth: '100%'
        },
        dataLabels: {
          name: {
            offsetY: -5,
            color: $textHeadingColor,
            fontSize: '1rem'
          },
          value: {
            offsetY: 15,
            color: $textHeadingColor,
            fontSize: '1.714rem'
          }
        }
      }
    },
    colors: [window.colors.solid.danger],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        type: 'horizontal',
        shadeIntensity: 0.5,
        gradientToColors: [window.colors.solid.primary],
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      }
    },
    stroke: {
      dashArray: 8
    },
    series: [83],
    labels: ['Completed Tickets']
  };
  supportChart = new ApexCharts($supportTrackerChart, supportChartOptions);
  supportChart.render();

  // Average Session Chart
  // ----------------------------------
  avgSessionChartOptions = {
    chart: {
      type: 'bar',
      height: 200,
      sparkline: { enabled: true },
      toolbar: { show: false }
    },
    states: {
      hover: {
        filter: 'none'
      }
    },
    colors: [
      $avgSessionStrokeColor2,
      $avgSessionStrokeColor2,
      window.colors.solid.primary,
      $avgSessionStrokeColor2,
      $avgSessionStrokeColor2,
      $avgSessionStrokeColor2
    ],
    series: [
      {
        name: 'Sessions',
        data: [75, 125, 225, 175, 125, 75, 25]
      }
    ],
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0
      }
    },
    plotOptions: {
      bar: {
        columnWidth: '45%',
        distributed: true,
        endingShape: 'rounded'
      }
    },
    tooltip: {
      x: { show: false }
    },
    xaxis: {
      type: 'numeric'
    }
  };
  avgSessionChart = new ApexCharts($avgSessionChart, avgSessionChartOptions);
  avgSessionChart.render();

  // Revenue Report Chart
  // ----------------------------------
  revenueReportChartOptions = {
    chart: {
      height: 230,
      stacked: true,
      type: 'bar',
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        columnWidth: '17%',
        endingShape: 'rounded'
      },
      distributed: true
    },
    colors: [window.colors.solid.primary, window.colors.solid.warning],
    series: [
      {
        name: 'Earning',
        data: [95, 177, 284, 256, 105, 63, 168, 218, 72]
      },
      {
        name: 'Expense',
        data: [-145, -80, -60, -180, -100, -60, -85, -75, -100]
      }
    ],
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    },
    grid: {
      padding: {
        top: -20,
        bottom: -10
      },
      yaxis: {
        lines: { show: false }
      }
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.86rem'
        }
      },
      axisTicks: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.86rem'
        }
      }
    }
  };
  revenueReportChart = new ApexCharts($revenueReportChart, revenueReportChartOptions);
  revenueReportChart.render();

  // Budget Chart
  // ----------------------------------
  budgetChartOptions = {
    chart: {
      height: 80,
      toolbar: { show: false },
      zoom: { enabled: false },
      type: 'line',
      sparkline: { enabled: true }
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 5],
      width: [2]
    },
    colors: [window.colors.solid.primary, $budgetStrokeColor2],
    series: [
      {
        data: [61, 48, 69, 52, 60, 40, 79, 60, 59, 43, 62]
      },
      {
        data: [20, 10, 30, 15, 23, 0, 25, 15, 20, 5, 27]
      }
    ],
    tooltip: {
      enabled: false
    }
  };
  budgetChart = new ApexCharts($budgetChart, budgetChartOptions);
  budgetChart.render();

  // Goal Overview  Chart
  // -----------------------------
  goalChartOptions = {
    chart: {
      height: 245,
      type: 'radialBar',
      sparkline: {
        enabled: true
      },
      dropShadow: {
        enabled: true,
        blur: 3,
        left: 1,
        top: 1,
        opacity: 0.1
      }
    },
    colors: [$goalStrokeColor2],
    plotOptions: {
      radialBar: {
        offsetY: -10,
        startAngle: -150,
        endAngle: 150,
        hollow: {
          size: '77%'
        },
        track: {
          background: $strokeColor,
          strokeWidth: '50%'
        },
        dataLabels: {
          name: {
            show: false
          },
          value: {
            color: $textHeadingColor,
            fontSize: '2.86rem',
            fontWeight: '600'
          }
        }
      }
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        type: 'horizontal',
        shadeIntensity: 0.5,
        gradientToColors: [window.colors.solid.success],
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      }
    },
    series: [83],
    stroke: {
      lineCap: 'round'
    },
    grid: {
      padding: {
        bottom: 30
      }
    }
  };
  goalChart = new ApexCharts($goalOverviewChart, goalChartOptions);
  goalChart.render();

  // Revenue  Chart
  // -----------------------------
  revenueChartOptions = {
    chart: {
      height: 240,
      toolbar: { show: false },
      zoom: { enabled: false },
      type: 'line',
      offsetX: -10
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 12],
      width: [4, 3]
    },
    grid: {
      borderColor: $labelColor
    },
    legend: {
      show: false
    },
    colors: [$revenueStrokeColor2, $strokeColor],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        inverseColors: false,
        gradientToColors: [window.colors.solid.primary, $strokeColor],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100]
      }
    },
    markers: {
      size: 0,
      hover: {
        size: 5
      }
    },
    xaxis: {
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '1rem'
        }
      },
      axisTicks: {
        show: false
      },
      categories: ['01', '05', '09', '13', '17', '21', '26', '31'],
      axisBorder: {
        show: false
      },
      tickPlacement: 'on'
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '1rem'
        },
        formatter: function (val) {
          return val > 999 ? (val / 1000).toFixed(0) + 'k' : val;
        }
      }
    },
    grid: {
      padding: {
        top: -20,
        bottom: -10,
        left: 20
      }
    },
    tooltip: {
      x: { show: false }
    },
    series: [
      {
        name: 'This Month',
        data: [45000, 47000, 44800, 47500, 45500, 48000, 46500, 48600]
      },
      {
        name: 'Last Month',
        data: [46000, 48000, 45500, 46600, 44500, 46500, 45000, 47000]
      }
    ]
  };
  revenueChart = new ApexCharts($revenueChart, revenueChartOptions);
  revenueChart.render();

  // Sales Chart
  // -----------------------------
  salesChartOptions = {
    chart: {
      height: 300,
      type: 'radar',
      dropShadow: {
        enabled: true,
        blur: 8,
        left: 1,
        top: 1,
        opacity: 0.2
      },
      toolbar: {
        show: false
      },
      offsetY: 5
    },
    series: [
      {
        name: 'Sales',
        data: [90, 50, 86, 40, 100, 20]
      },
      {
        name: 'Visit',
        data: [70, 75, 70, 76, 20, 85]
      }
    ],
    stroke: {
      width: 0
    },
    colors: [window.colors.solid.primary, window.colors.solid.info],
    plotOptions: {
      radar: {
        polygons: {
          strokeColors: [$strokeColor, 'transparent', 'transparent', 'transparent', 'transparent', 'transparent'],
          connectorColors: 'transparent'
        }
      }
    },
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        gradientToColors: [window.colors.solid.primary, window.colors.solid.info],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100]
      }
    },
    markers: {
      size: 0
    },
    legend: {
      show: false
    },
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    dataLabels: {
      background: {
        foreColor: [$strokeColor, $strokeColor, $strokeColor, $strokeColor, $strokeColor, $strokeColor]
      }
    },
    yaxis: {
      show: false
    },
    grid: {
      show: false,
      padding: {
        bottom: -27
      }
    }
  };
  salesChart = new ApexCharts($salesChart, salesChartOptions);
  salesChart.render();

  // Sales Line Chart
  // -----------------------------
  salesLineChartOptions = {
    chart: {
      height: 240,
      toolbar: { show: false },
      zoom: { enabled: false },
      type: 'line',
      dropShadow: {
        enabled: true,
        top: 18,
        left: 2,
        blur: 5,
        opacity: 0.2
      },
      offsetX: -10
    },
    stroke: {
      curve: 'smooth',
      width: 4
    },
    grid: {
      borderColor: $strokeColor,
      padding: {
        top: -20,
        bottom: 5,
        left: 20
      }
    },
    legend: {
      show: false
    },
    colors: [$salesStrokeColor2],
    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        inverseColors: false,
        gradientToColors: [window.colors.solid.primary],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100]
      }
    },
    markers: {
      size: 0,
      hover: {
        size: 5
      }
    },
    xaxis: {
      labels: {
        offsetY: 5,
        style: {
          colors: $textMutedColor,
          fontSize: '0.857rem'
        }
      },
      axisTicks: {
        show: false
      },
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      axisBorder: {
        show: false
      },
      tickPlacement: 'on'
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        style: {
          colors: $textMutedColor,
          fontSize: '0.857rem'
        },
        formatter: function (val) {
          return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
        }
      }
    },
    tooltip: {
      x: { show: false }
    },
    series: [
      {
        name: 'Sales',
        data: [140, 180, 150, 205, 160, 295, 125, 255, 205, 305, 240, 295]
      }
    ]
  };
  salesLineChart = new ApexCharts($salesLineChart, salesLineChartOptions);
  salesLineChart.render();

  // Session Chart
  // ----------------------------------
  sessionChartOptions = {
    chart: {
      type: 'donut',
      height: 300,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [58.6, 34.9, 6.5],
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: ['Desktop', 'Mobile', 'Tablet'],
    stroke: { width: 0 },
    colors: [window.colors.solid.primary, window.colors.solid.warning, window.colors.solid.danger]
  };
  sessionChart = new ApexCharts($sessionChart, sessionChartOptions);
  sessionChart.render();

  // Customer Chart
  // -----------------------------
  customerChartOptions = {
    chart: {
      type: 'pie',
      height: 325,
      toolbar: {
        show: false
      }
    },
    labels: ['New', 'Returning', 'Referrals'],
    series: [690, 258, 149],
    dataLabels: {
      enabled: false
    },
    legend: { show: false },
    stroke: {
      width: 4
    },
    colors: [window.colors.solid.primary, window.colors.solid.warning, window.colors.solid.danger]
  };
  customerChart = new ApexCharts($customerChart, customerChartOptions);
  customerChart.render();

  // Product Order Chart
  // -----------------------------
  orderChartOptions = {
    chart: {
      height: 325,
      type: 'radialBar'
    },
    colors: [window.colors.solid.primary, window.colors.solid.warning, window.colors.solid.danger],
    stroke: {
      lineCap: 'round'
    },
    plotOptions: {
      radialBar: {
        size: 150,
        hollow: {
          size: '20%'
        },
        track: {
          strokeWidth: '100%',
          margin: 15
        },
        dataLabels: {
          value: {
            fontSize: '1rem',
            colors: $textHeadingColor,
            fontWeight: '500',
            offsetY: 5
          },
          total: {
            show: true,
            label: 'Total',
            fontSize: '1.286rem',
            colors: $textHeadingColor,
            fontWeight: '500',

            formatter: function (w) {
              // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
              return 42459;
            }
          }
        }
      }
    },
    series: [70, 52, 26],
    labels: ['Finished', 'Pending', 'Rejected']
  };
  orderChart = new ApexCharts($productOrderChart, orderChartOptions);
  orderChart.render();

  // Earnings Chart
  // -----------------------------
  earningsChartOptions = {
    chart: {
      type: 'donut',
      height: 120,
      toolbar: {
        show: false
      }
    },
    dataLabels: {
      enabled: false
    },
    series: [53, 16, 31],
    legend: { show: false },
    comparedResult: [2, -3, 8],
    labels: ['App', 'Service', 'Product'],
    stroke: { width: 0 },
    colors: [$earningsStrokeColor2, $earningsStrokeColor3, window.colors.solid.success],
    grid: {
      padding: {
        right: -20,
        bottom: -8,
        left: -20
      }
    },
    plotOptions: {
      pie: {
        startAngle: -10,
        donut: {
          labels: {
            show: true,
            name: {
              offsetY: 15
            },
            value: {
              offsetY: -15,
              formatter: function (val) {
                return parseInt(val) + '%';
              }
            },
            total: {
              show: true,
              offsetY: 15,
              label: 'App',
              formatter: function (w) {
                return '53%';
              }
            }
          }
        }
      }
    },
    responsive: [
      {
        breakpoint: 1325,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 1200,
        options: {
          chart: {
            height: 120
          }
        }
      },
      {
        breakpoint: 1065,
        options: {
          chart: {
            height: 100
          }
        }
      },
      {
        breakpoint: 992,
        options: {
          chart: {
            height: 120
          }
        }
      }
    ]
  };
  earningsChart = new ApexCharts($earningsChart, earningsChartOptions);
  earningsChart.render();
});
