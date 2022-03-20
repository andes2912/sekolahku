/*=========================================================================================
    File Name: dashboard-ecommerce.js
    Description: dashboard ecommerce page content with Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(window).on('load', function () {
  'use strict';

  var $barColor = '#f3f3f3';
  var $trackBgColor = '#EBEBEB';
  var $textMutedColor = '#b9b9c3';
  var $budgetStrokeColor2 = '#dcdae3';
  var $goalStrokeColor2 = '#51e5a8';
  var $strokeColor = '#ebe9f1';
  var $textHeadingColor = '#5e5873';
  var $earningsStrokeColor2 = '#28c76f66';
  var $earningsStrokeColor3 = '#28c76f33';

  var $statisticsOrderChart = document.querySelector('#statistics-order-chart');
  var $statisticsProfitChart = document.querySelector('#statistics-profit-chart');
  var $earningsChart = document.querySelector('#earnings-chart');
  var $revenueReportChart = document.querySelector('#revenue-report-chart');
  var $budgetChart = document.querySelector('#budget-chart');
  var $browserStateChartPrimary = document.querySelector('#browser-state-chart-primary');
  var $browserStateChartWarning = document.querySelector('#browser-state-chart-warning');
  var $browserStateChartSecondary = document.querySelector('#browser-state-chart-secondary');
  var $browserStateChartInfo = document.querySelector('#browser-state-chart-info');
  var $browserStateChartDanger = document.querySelector('#browser-state-chart-danger');
  var $goalOverviewChart = document.querySelector('#goal-overview-radial-bar-chart');

  var statisticsOrderChartOptions;
  var statisticsProfitChartOptions;
  var earningsChartOptions;
  var revenueReportChartOptions;
  var budgetChartOptions;
  var browserStatePrimaryChartOptions;
  var browserStateWarningChartOptions;
  var browserStateSecondaryChartOptions;
  var browserStateInfoChartOptions;
  var browserStateDangerChartOptions;
  var goalOverviewChartOptions;

  var statisticsOrderChart;
  var statisticsProfitChart;
  var earningsChart;
  var revenueReportChart;
  var budgetChart;
  var browserStatePrimaryChart;
  var browserStateDangerChart;
  var browserStateInfoChart;
  var browserStateSecondaryChart;
  var browserStateWarningChart;
  var goalOverviewChart;
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

  //------------ Statistics Bar Chart ------------
  //----------------------------------------------
  statisticsOrderChartOptions = {
    chart: {
      height: 70,
      type: 'bar',
      stacked: true,
      toolbar: {
        show: false
      }
    },
    grid: {
      show: false,
      padding: {
        left: 0,
        right: 0,
        top: -15,
        bottom: -15
      }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '20%',
        startingShape: 'rounded',
        colors: {
          backgroundBarColors: [$barColor, $barColor, $barColor, $barColor, $barColor],
          backgroundBarRadius: 5
        }
      }
    },
    legend: {
      show: false
    },
    dataLabels: {
      enabled: false
    },
    colors: [window.colors.solid.warning],
    series: [
      {
        name: '2020',
        data: [45, 85, 65, 45, 65]
      }
    ],
    xaxis: {
      labels: {
        show: false
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      show: false
    },
    tooltip: {
      x: {
        show: false
      }
    }
  };
  statisticsOrderChart = new ApexCharts($statisticsOrderChart, statisticsOrderChartOptions);
  statisticsOrderChart.render();

  //------------ Statistics Line Chart ------------
  //-----------------------------------------------
  statisticsProfitChartOptions = {
    chart: {
      height: 70,
      type: 'line',
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    grid: {
      borderColor: $trackBgColor,
      strokeDashArray: 5,
      xaxis: {
        lines: {
          show: true
        }
      },
      yaxis: {
        lines: {
          show: false
        }
      },
      padding: {
        top: -30,
        bottom: -10
      }
    },
    stroke: {
      width: 3
    },
    colors: [window.colors.solid.info],
    series: [
      {
        data: [0, 20, 5, 30, 15, 45]
      }
    ],
    markers: {
      size: 2,
      colors: window.colors.solid.info,
      strokeColors: window.colors.solid.info,
      strokeWidth: 2,
      strokeOpacity: 1,
      strokeDashArray: 0,
      fillOpacity: 1,
      discrete: [
        {
          seriesIndex: 0,
          dataPointIndex: 5,
          fillColor: '#ffffff',
          strokeColor: window.colors.solid.info,
          size: 5
        }
      ],
      shape: 'circle',
      radius: 2,
      hover: {
        size: 3
      }
    },
    xaxis: {
      labels: {
        show: true,
        style: {
          fontSize: '0px'
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      show: false
    },
    tooltip: {
      x: {
        show: false
      }
    }
  };
  statisticsProfitChart = new ApexCharts($statisticsProfitChart, statisticsProfitChartOptions);
  statisticsProfitChart.render();

  //--------------- Earnings Chart ---------------
  //----------------------------------------------
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
        breakpoint: 1045,
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

  //------------ Revenue Report Chart ------------
  //----------------------------------------------
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

  //---------------- Budget Chart ----------------
  //----------------------------------------------
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

  //------------ Browser State Charts ------------
  //----------------------------------------------

  // State Primary Chart
  browserStatePrimaryChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.primary],
    series: [54.4],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStatePrimaryChart = new ApexCharts($browserStateChartPrimary, browserStatePrimaryChartOptions);
  browserStatePrimaryChart.render();

  // State Warning Chart
  browserStateWarningChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.warning],
    series: [6.1],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateWarningChart = new ApexCharts($browserStateChartWarning, browserStateWarningChartOptions);
  browserStateWarningChart.render();

  // State Secondary Chart 1
  browserStateSecondaryChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.secondary],
    series: [14.6],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateSecondaryChart = new ApexCharts($browserStateChartSecondary, browserStateSecondaryChartOptions);
  browserStateSecondaryChart.render();

  // State Info Chart
  browserStateInfoChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.info],
    series: [4.2],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateInfoChart = new ApexCharts($browserStateChartInfo, browserStateInfoChartOptions);
  browserStateInfoChart.render();

  // State Danger Chart
  browserStateDangerChartOptions = {
    chart: {
      height: 30,
      width: 30,
      type: 'radialBar'
    },
    grid: {
      show: false,
      padding: {
        left: -15,
        right: -15,
        top: -12,
        bottom: -15
      }
    },
    colors: [window.colors.solid.danger],
    series: [8.4],
    plotOptions: {
      radialBar: {
        hollow: {
          size: '22%'
        },
        track: {
          background: $trackBgColor
        },
        dataLabels: {
          showOn: 'always',
          name: {
            show: false
          },
          value: {
            show: false
          }
        }
      }
    },
    stroke: {
      lineCap: 'round'
    }
  };
  browserStateDangerChart = new ApexCharts($browserStateChartDanger, browserStateDangerChartOptions);
  browserStateDangerChart.render();

  //------------ Goal Overview Chart ------------
  //---------------------------------------------
  goalOverviewChartOptions = {
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
  goalOverviewChart = new ApexCharts($goalOverviewChart, goalOverviewChartOptions);
  goalOverviewChart.render();
});
