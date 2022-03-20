/*=========================================================================================
    File Name: dashboard-analytics.js
    Description: dashboard analytics page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on('load', function () {
  'use strict';

  var $avgSessionStrokeColor2 = '#ebf0f7';
  var $textHeadingColor = '#5e5873';
  var $white = '#fff';
  var $strokeColor = '#ebe9f1';

  var $gainedChart = document.querySelector('#gained-chart');
  var $orderChart = document.querySelector('#order-chart');
  var $avgSessionsChart = document.querySelector('#avg-sessions-chart');
  var $supportTrackerChart = document.querySelector('#support-trackers-chart');
  var $salesVisitChart = document.querySelector('#sales-visit-chart');

  var gainedChartOptions;
  var orderChartOptions;
  var avgSessionsChartOptions;
  var supportTrackerChartOptions;
  var salesVisitChartOptions;

  var gainedChart;
  var orderChart;
  var avgSessionsChart;
  var supportTrackerChart;
  var salesVisitChart;
  var isRtl = $('html').attr('data-textdirection') === 'rtl';

  // On load Toast
  setTimeout(function () {
    toastr['success'](
      'You have successfully logged in to Vuexy. Now you can start to explore!',
      '👋 Welcome John Doe!',
      {
        closeButton: true,
        tapToDismiss: false,
        rtl: isRtl
      }
    );
  }, 2000);

  // Subscribed Gained Chart
  // ----------------------------------

  gainedChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.primary],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Subscribers',
        data: [28, 40, 36, 52, 38, 60, 55]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  gainedChart = new ApexCharts($gainedChart, gainedChartOptions);
  gainedChart.render();

  // Order Received Chart
  // ----------------------------------

  orderChartOptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      }
    },
    colors: [window.colors.solid.warning],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [
      {
        name: 'Orders',
        data: [10, 15, 8, 15, 7, 12, 8]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      }
    },
    yaxis: [
      {
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 }
      }
    ],
    tooltip: {
      x: { show: false }
    }
  };
  orderChart = new ApexCharts($orderChart, orderChartOptions);
  orderChart.render();

  // Average Session Chart
  // ----------------------------------
  avgSessionsChartOptions = {
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
  avgSessionsChart = new ApexCharts($avgSessionsChart, avgSessionsChartOptions);
  avgSessionsChart.render();

  // Support Tracker Chart
  // -----------------------------
  supportTrackerChartOptions = {
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
  supportTrackerChart = new ApexCharts($supportTrackerChart, supportTrackerChartOptions);
  supportTrackerChart.render();

  // Sales Chart
  // -----------------------------
  salesVisitChartOptions = {
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
  salesVisitChart = new ApexCharts($salesVisitChart, salesVisitChartOptions);
  salesVisitChart.render();
});
