<!-- v4.0.0 -->
<link rel="stylesheet" href="{{ asset('dist/bootstrap/css/bootstrap.min.css') }}" />

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/dist/img/favicon-16x16.png')}}" />

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />

<!-- Theme style -->
<link rel="stylesheet" href="{{asset('storage/dist/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('storage/dist/css/font-awesome/css/font-awesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('storage/dist/css/et-line-font/et-line-font.css')}}" />
<link rel="stylesheet" href="{{asset('storage/dist/css/themify-icons/themify-icons.css')}}" />
<link rel="stylesheet" href="{{asset('storage/dist/css/simple-lineicon/simple-line-icons.css')}}" />
<link rel="stylesheet" href="{{asset("storage/dist/plugins/dropify/dropify.min.css")}}">

<link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v3.7.min.css" rel="stylesheet" type="text/css"/>


  
<style>
    .search-button {
	background: blue;
	color: white;
	border: 1px solid white !important;
	padding: 6px 15px 6px 15px;
	width: 100%;
}

.reset-button {
	color: red;
	border: 1px solid red !important;
	padding: 6px 15px 6px 15px;
	width: 100%;
    background: white;
}

select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem);
}

.widget-flat {
  --tz-card-spacer-y: 1.5rem;
  --tz-card-spacer-x: 1.5rem;
  --tz-card-title-spacer-y: 0.75rem;
  --tz-card-border-width: var(--tz-theme-card-border-width);
  --tz-card-border-color: var(--tz-border-color);
  --tz-card-border-radius: var(--tz-border-radius-sm);
  --tz-card-box-shadow: var(--tz-box-shadow);
  --tz-card-inner-border-radius: calc(var(--tz-border-radius-sm) - (var(--tz-theme-card-border-width)));
  --tz-card-cap-padding-y: 1.125rem;
  --tz-card-cap-padding-x: 1.5rem;
  --tz-card-cap-bg: var(--tz-tertiary-bg);
  --tz-card-bg: var(--tz-secondary-bg);
  --tz-card-img-overlay-padding: 1.5rem;
  --tz-card-group-margin: 0.625rem;
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  height: var(--tz-card-height);
  color: var(--tz-body-color);
  word-wrap: break-word;
  background-color: var(--tz-card-bg);
  background-clip: border-box;
  border: var(--tz-card-border-width) solid var(--tz-card-border-color);
  border-radius: var(--tz-card-border-radius);
  padding: 10px;
}

.card-body {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: var(--tz-card-spacer-y) var(--tz-card-spacer-x);
  color: var(--tz-card-color);
}

.float-end {
  float: right !important;
}

.text-uppercase {
  text-transform: uppercase !important;
}

.my-2 {
  margin-top: 0.75rem !important;
  margin-bottom: 0.75rem !important;
}

.mb-0 {
  margin-bottom: 0 !important;
}

.bg-opacity-10 {
  --tz-bg-opacity: 0.1;
}

.text-bg-purple {
  color: #fff !important;
  background-color: RGBA(113, 108, 176, var(--tz-bg-opacity, 1)) !important;
}

.text-bg-pink {
  color: #fff !important;
  background-color: RGBA(242, 79, 124, var(--tz-bg-opacity, 1)) !important;
}

.text-bg-info {
  color: #fff !important;
  background-color: RGBA(51, 176, 224, var(--tz-bg-opacity, 1)) !important;
}

.text-bg-primary {
  color: #fff !important;
  background-color: RGBA(59, 192, 195, var(--tz-bg-opacity, 1)) !important;
}

h6 {
  font-size: .74375rem;
}

h2 {
  font-size: 1.82rem;
}

.badge {
  --tz-badge-padding-x: 0.4em;
  --tz-badge-padding-y: 0.25em;
  --tz-badge-font-size: 0.8em;
  --tz-badge-font-weight: 500;
  --tz-badge-color: #fff;
  --tz-badge-border-radius: 0.375rem;
  display: inline-block;
  padding: var(--tz-badge-padding-y) var(--tz-badge-padding-x);
  font-size: var(--tz-badge-font-size);
  font-weight: var(--tz-badge-font-weight);
  line-height: 1;
  color: var(--tz-badge-color);
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: var(--tz-badge-border-radius);
}


h1,
h2,
h3,
h4,
h5,
h6 {
  margin-top: 0;
  margin-bottom: 10px;
  font-weight: 600;
  line-height: 1.1;
  color: var(--tz-heading-color);
}

.text-nowrap {
  white-space: nowrap !important;
}

.me-1 {
  margin-right: 0.375rem !important;
}
</style>