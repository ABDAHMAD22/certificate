<div class="worker-card custom-card">
    <div class="row align-items-center">
        <div class="col-md-8 d-flex align-items-center">
            @if(isset($has_check) && $has_check)
                <label class="checkbox-field custom-label">
                    <div class="remember-checkbox">
                        <input type="checkbox" class="checkbox">
                        <img src="{{ asset('site/img/checked.svg') }}" alt="image">
                    </div>
                </label>
            @endif
            <div class="img-handler">
                <img src="{{ Storage::url($student->image?$student->image:$template_image) }}" alt="image">
            </div>
            <div class="card-info">
                <p>{{$student->id_no}}</p>
                <h3>{{$student->name}}</h3>
                <p class="email">{{$student->email}}</p>
            </div>
        </div>
        <div class="col-md-4 custom-col">
            <ul class="list-unstyled option-list d-flex align-items-center justify-content-between">
                <li>
                    <a href="{{route('certificate.export', ['certificateStudent'=>$student->id])}}">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M10 19.5C10 19.5 13.25 13 18.9375 13C24.625 13 27.875 19.5 27.875 19.5C27.875 19.5 24.625 26 18.9375 26C13.25 26 10 19.5 10 19.5Z"
                                  stroke="#616161" stroke-width="1.3" stroke-linecap="round"
                                  stroke-linejoin="round"/>
                            <circle cx="18.9375" cy="19.5" r="2.4375" stroke="#616161"
                                    stroke-width="1.3"
                                    stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
                @if($has_update)
                    <li>
                        <a href="{{route('student.update', ['certificateStudent'=>$student])}}">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                                <path
                                    d="M18.4286 14.1428H13.4286C12.6396 14.1428 12 14.7824 12 15.5714V25.5714C12 26.3604 12.6396 27 13.4286 27H23.4286C24.2175 27 24.8571 26.3604 24.8571 25.5714V20.5714"
                                    stroke="#616161" stroke-width="1.3" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M23.7861 13.0715C24.3779 12.4798 25.3373 12.4798 25.929 13.0715C26.5207 13.6632 26.5207 14.6226 25.929 15.2143L19.1433 22.0001L16.2861 22.7143L17.0004 19.8572L23.7861 13.0715Z"
                                      stroke="#616161" stroke-width="1.3" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </li>
                @endif
                <li>
{{--                    {{ Storage::url($student->image?$student->image:$template_image) }}--}}
                    <a class="download-certificate"
                       href="{{ $student->image ? route('certificate.exportPDF', ['certificateStudent'=>$student]) : $template_image }}" download="">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                            <path
                                d="M26 22V25.3333C26 26.2538 25.2538 27 24.3333 27H12.6667C11.7462 27 11 26.2538 11 25.3333V22"
                                stroke="#616161" stroke-width="1.3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path d="M14.333 17.8333L18.4997 21.9999L22.6663 17.8333" stroke="#616161"
                                  stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.4997 22V12" stroke="#616161" stroke-width="1.3"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="share-certificate"
                       target="_blank"
                       href="{{route('certificate.export', ['certificateStudent'=>$student->id])}}"
                       data-share="{{route('certificate.exportPDFByName', [
     'certificate' => $certificate->id,
    'name' => str_replace(" ", "-", $student->name),
])}}">
                        <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <rect width="38" height="38" rx="19" fill="#F3F3F3"/>
                            <path
                                d="M18 20.25C18.6517 21.1212 19.6497 21.6665 20.735 21.7442C21.8203 21.8219 22.8858 21.4245 23.655 20.655L25.905 18.405C27.3261 16.9336 27.3058 14.5947 25.8593 13.1482C24.4128 11.7017 22.0739 11.6813 20.6025 13.1025L19.3125 14.385"
                                stroke="#616161" stroke-width="1.3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                            <path
                                d="M20.9997 18.7499C20.3479 17.8787 19.3499 17.3334 18.2647 17.2557C17.1794 17.178 16.1139 17.5754 15.3447 18.3449L13.0947 20.5949C11.6735 22.0664 11.6938 24.4053 13.1403 25.8518C14.5868 27.2983 16.9257 27.3186 18.3972 25.8974L19.6797 24.6149"
                                stroke="#616161" stroke-width="1.3" stroke-linecap="round"
                                stroke-linejoin="round"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a class="btn-certificate-delete" href="{{ route('student.deleteCertificate', ['certificateStudent'=>$student->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38">
                            <rect width="38" height="38" rx="19" fill="#f3f3f3"/>
                            <g transform="translate(8.437 11)">
                                <path d="M15.552,2.041H12.746v-.51A1.532,1.532,0,0,0,11.216,0H9.175A1.532,1.532,0,0,0,7.644,1.531v.51H4.838A1.277,1.277,0,0,0,3.563,3.316V5.1a.51.51,0,0,0,.51.51h.279l.441,9.256a1.529,1.529,0,0,0,1.529,1.458h7.748A1.529,1.529,0,0,0,15.6,14.869l.441-9.256h.279a.51.51,0,0,0,.51-.51V3.316A1.277,1.277,0,0,0,15.552,2.041Zm-6.888-.51a.511.511,0,0,1,.51-.51h2.041a.511.511,0,0,1,.51.51v.51H8.665ZM4.583,3.316a.255.255,0,0,1,.255-.255H15.552a.255.255,0,0,1,.255.255V4.592H4.583Zm10,11.5a.51.51,0,0,1-.51.486H6.321a.51.51,0,0,1-.51-.486L5.373,5.612h9.644Z" fill="#616161"/>
                                <path d="M18.323,23.091a.51.51,0,0,0,.51-.51V15.948a.51.51,0,1,0-1.02,0V22.58A.51.51,0,0,0,18.323,23.091Z" transform="translate(-8.128 -8.805)" fill="#616161"/>
                                <path d="M24.26,23.091a.51.51,0,0,0,.51-.51V15.948a.51.51,0,1,0-1.02,0V22.58A.51.51,0,0,0,24.26,23.091Z" transform="translate(-11.514 -8.805)" fill="#616161"/>
                                <path d="M12.385,23.091a.51.51,0,0,0,.51-.51V15.948a.51.51,0,0,0-1.02,0V22.58A.51.51,0,0,0,12.385,23.091Z" transform="translate(-4.741 -8.805)" fill="#616161"/>
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div><!-- worker-card -->
