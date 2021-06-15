<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="./static/css/dashboard.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a class="ml-4" href="#ide">User IDEs</a>
        <a class="ml-4" href="#instance">User Instances</a>
        <a class="ml-4" href="#news">News</a>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="snap-scroll">
                <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
                    <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">What's new on MyCloudInstance</h1>
                    <p class="lead my-3">Development is still in progress. However, major advancements are being made and we are expecting to have functional instances soon.</p>
                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-primary">Create a Web App</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">Read our blog about web design</a>
                            </h3>
                            <div class="mb-1 text-muted">Jun 15</div>
                            <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#">Continue reading</a>
                            </div>
                            <svg class="card-img-right flex-auto d-none d-md-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><g fill="none" fill-rule="evenodd" stroke="#232F3D" stroke-linejoin="round" stroke-width="2.727273"><path d="M21.541667 50.891227h-1.557292c-6.242708 0-11.61875-4.65-11.957292-10.731818C8.013542 39.90032 8 39.627591 8 39.341227c0-7.036363 4.726042-10.145454 8.9375-11.195454-.08125-.654546-.121875-1.322727-.121875-1.99091 0-5.768181 4.008333-12.40909 9.763542-14.768181 7.366666-3.04091 14.110416-.736364 18.538541 3.586363 2.058334 2.004546 3.561459 4.527273 4.563542 7.268182 1.394792-1.840909 3.439583-2.795454 5.484375-2.795454 3.466667 0 6.933333 2.727273 7.271875 8.495454C66.41875 28.745773 73 31.213954 73 39.436682c0 9.504545-7.596875 11.454545-12.1875 11.454545M39.145833 69.9955v-35.4m10.833334 17.291182v8.563636H39.145833"></path><path d="M39.145833 53.617818H28.3125v-5.188636m6.011146-6.053318c0 3.343636-2.69073 6.053182-6.011146 6.053182-3.320417 0-6.011146-2.709546-6.011146-6.053182 0-3.343637 2.69073-6.053182 6.011146-6.053182 3.320417 0 6.011146 2.709545 6.011146 6.053182zm9.644374 3.459c0 3.343636 2.69073 6.053181 6.011147 6.053181 3.320416 0 6.011146-2.709545 6.011146-6.053181 0-3.343637-2.69073-6.053182-6.011146-6.053182-3.320417 0-6.011146 2.709545-6.011146 6.053182zm1.18896-17.294454c0 3.342272-2.69073 6.05318-6.011147 6.05318-3.320416 0-6.011146-2.710908-6.011146-6.05318 0-3.343637 2.69073-6.053183 6.011146-6.053183 3.320417 0 6.011146 2.709546 6.011146 6.053182z"></path></g></svg>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">Launch an Instance</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="#">Simple Ubuntu Instances</a>
                            </h3>
                            <div class="mb-1 text-muted">Jun 15</div>
                            <p class="card-text mb-auto">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a href="#">Continue reading</a>
                            </div>
                            <svg class="card-img-right flex-auto d-none d-md-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><g fill="none" fill-rule="evenodd" stroke="#232F3D" stroke-linejoin="round" stroke-width="2.5"><path d="M37.5 17.5v-6.24125c0-.695.56375-1.25875 1.25875-1.25875h29.9825C69.43625 10 70 10.56375 70 11.25875v29.9825c0 .695-.56375 1.25875-1.25875 1.25875H62.5m-20 20v6.24125c0 .695-.56375 1.25875-1.25875 1.25875h-29.9825C10.56375 70 10 69.43625 10 68.74125v-29.9825c0-.695.56375-1.25875 1.25875-1.25875H17.5"></path><path d="M26.48075 25H53.5195c.8175 0 1.48.6625 1.48 1.48125v27.0375c0 .81875-.6625 1.48125-1.48 1.48125H26.48075c-.8175 0-1.48125-.6625-1.48125-1.48125v-27.0375c0-.81875.66375-1.48125 1.48125-1.48125zM27.5 20v5m6.25-5v5M40 20v5m6.25-5v5m6.25-5v5m-25 30v5m6.25-5v5M40 55v5m6.25-5v5m6.25-5v5M20 52.5h5m-5-6.25h5M20 40h5m-5-6.25h5m-5-6.25h5m30 25h5m-5-6.25h5M55 40h5m-5-6.25h5m-5-6.25h5"></path></g></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ide" class="snap-scroll">
                <h1 style="font-size: 2.5rem;">Active IDE's<h1>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">MyJavaProject - Java</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Last Used</a>
                                </h3>
                                <div class="mb-1 text-muted">Jun 15</div>
                                <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mb-1 text-muted">3 views</div>
                                <div class="mb-1 text-muted">0 forks</div>
                                <a href="./gnu">Go to editor</a>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><g fill="none" fill-rule="evenodd" stroke="#232F3D" stroke-linejoin="round" stroke-width="2.586207"><path d="M70.858692 18.275696L54.207817 9.999609v60l16.650875-5.637392zM9 18.275696l16.791667-8.276087v60L9 64.362217z"></path><path stroke-dasharray="3.87931 3.87931" d="M25.791667 25.652174h28.416666M25.791667 54.362435h28.416666"></path><path d="M35.15935 35.116913l-4.8515 4.19087 4.855375 4.183043M44.834967 35.116913l4.857958 4.180435-4.850208 4.193478M42.553108 32.330565l-5.134375 15.328696"></path></g></svg>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-success">Neural Network - Python</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Last Used</a>
                                </h3>
                                <div class="mb-1 text-muted">Jun 15</div>
                                <p class="card-text mb-auto">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                
                                <div class="mb-1 text-muted">15 views</div>
                                <div class="mb-1 text-muted">3 forks</div>
                                <a href="./gnu">Go to editor</a>
                            </div>
                            <svg class="card-img-right flex-auto d-none d-md-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><g fill="none" fill-rule="evenodd" stroke="#232F3D" stroke-linejoin="round" stroke-width="2.727273"><path d="M21.541667 50.891227h-1.557292c-6.242708 0-11.61875-4.65-11.957292-10.731818C8.013542 39.90032 8 39.627591 8 39.341227c0-7.036363 4.726042-10.145454 8.9375-11.195454-.08125-.654546-.121875-1.322727-.121875-1.99091 0-5.768181 4.008333-12.40909 9.763542-14.768181 7.366666-3.04091 14.110416-.736364 18.538541 3.586363 2.058334 2.004546 3.561459 4.527273 4.563542 7.268182 1.394792-1.840909 3.439583-2.795454 5.484375-2.795454 3.466667 0 6.933333 2.727273 7.271875 8.495454C66.41875 28.745773 73 31.213954 73 39.436682c0 9.504545-7.596875 11.454545-12.1875 11.454545M39.145833 69.9955v-35.4m10.833334 17.291182v8.563636H39.145833"></path><path d="M39.145833 53.617818H28.3125v-5.188636m6.011146-6.053318c0 3.343636-2.69073 6.053182-6.011146 6.053182-3.320417 0-6.011146-2.709546-6.011146-6.053182 0-3.343637 2.69073-6.053182 6.011146-6.053182 3.320417 0 6.011146 2.709545 6.011146 6.053182zm9.644374 3.459c0 3.343636 2.69073 6.053181 6.011147 6.053181 3.320416 0 6.011146-2.709545 6.011146-6.053181 0-3.343637-2.69073-6.053182-6.011146-6.053182-3.320417 0-6.011146 2.709545-6.011146 6.053182zm1.18896-17.294454c0 3.342272-2.69073 6.05318-6.011147 6.05318-3.320416 0-6.011146-2.710908-6.011146-6.05318 0-3.343637 2.69073-6.053183 6.011146-6.053183 3.320417 0 6.011146 2.709546 6.011146 6.053182z"></path></g></svg>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-secondary">testProject - C++</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Last Used</a>
                                </h3>
                                <div class="mb-1 text-muted">Jun 2</div>
                                <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mb-1 text-muted">1 views</div>
                                <div class="mb-1 text-muted">0 forks</div>
                                <a href="./gnu">Go to editor</a>
                            </div>
                            <svg class="card-img-right flex-auto d-none d-md-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><g fill="none" fill-rule="evenodd" stroke="#232F3D" stroke-linejoin="round" stroke-width="2.5"><path d="M37.5 17.5v-6.24125c0-.695.56375-1.25875 1.25875-1.25875h29.9825C69.43625 10 70 10.56375 70 11.25875v29.9825c0 .695-.56375 1.25875-1.25875 1.25875H62.5m-20 20v6.24125c0 .695-.56375 1.25875-1.25875 1.25875h-29.9825C10.56375 70 10 69.43625 10 68.74125v-29.9825c0-.695.56375-1.25875 1.25875-1.25875H17.5"></path><path d="M26.48075 25H53.5195c.8175 0 1.48.6625 1.48 1.48125v27.0375c0 .81875-.6625 1.48125-1.48 1.48125H26.48075c-.8175 0-1.48125-.6625-1.48125-1.48125v-27.0375c0-.81875.66375-1.48125 1.48125-1.48125zM27.5 20v5m6.25-5v5M40 20v5m6.25-5v5m6.25-5v5m-25 30v5m6.25-5v5M40 55v5m6.25-5v5m6.25-5v5M20 52.5h5m-5-6.25h5M20 40h5m-5-6.25h5m-5-6.25h5m30 25h5m-5-6.25h5M55 40h5m-5-6.25h5m-5-6.25h5"></path></g></svg>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div id="instance" class="snap-scroll">
                <h1 style="font-size: 2.5rem;">User Instances<h1>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">Demo Instance - Ubuntu</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Last Used</a>
                                </h3>
                                <div class="mb-1 text-muted">Jun 15</div>
                                <p class="card-text mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mb-1 text-muted">Status: Inactive</div>
                                <div class="mb-1 text-muted">Time Left: 0s</div>
                                <a href="./gnu">Go to instance</a>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><defs><path id="a" d="M.490076.368875h1.239131V47.5H.490076z"></path></defs><g fill="none" fill-rule="evenodd"><g transform="translate(39.26087 22.5)"><mask id="b" fill="#fff"></mask><path stroke="#232F3D" stroke-linejoin="round" stroke-width="2.484472" d="M1.109641.368875v47.13125" mask="url(#b)"></path></g><path stroke="#232F3D" stroke-linejoin="round" stroke-width="2.484472" d="M24.756724 38.821125h6.778043v31.17875M55.917137 38.821125h-6.776804v31.17875M46.715602 16.434625c0 3.55375-2.856195 6.43375-6.377804 6.43375-3.522848 0-6.379044-2.88-6.379044-6.43375s2.856196-6.43375 6.379044-6.43375c3.521609 0 6.377804 2.88 6.377804 6.43375zM24.756724 38.821125c0 3.55375-2.854957 6.43375-6.377804 6.43375-3.522848 0-6.379044-2.88-6.379044-6.43375s2.856196-6.43375 6.379044-6.43375c3.522847 0 6.377804 2.88 6.377804 6.43375zM68.67448 38.821125c0 3.55375-2.856195 6.43375-6.377804 6.43375-3.524087 0-6.379043-2.88-6.379043-6.43375s2.854956-6.43375 6.379043-6.43375c3.521609 0 6.377804 2.88 6.377804 6.43375z"></path><path stroke="#232F3D" stroke-linejoin="round" stroke-width="2.484472" d="M19.3017 32.45875c2.109-7.08375 7.645435-12.685 14.656435-14.83625m12.642848-.035c7.065521 2.125 12.650282 7.74875 14.771673 14.86875m0 12.7275C58.656483 54.3075 50.25394 60.9725 40.337178 60.9725c-9.920478 0-18.3255-6.67125-21.037956-15.8"></path></g></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
