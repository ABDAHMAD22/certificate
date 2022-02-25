@if($certificate_student)
    <div class="worker-card custom-card">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center flex-grow-1">
                <div class="img-handler">
                    <img
                        src="{{ Storage::url($certificate_student->image?$certificate_student->image:$template_image) }}"
                        alt="image">
                </div>
                <div class="card-info">
                    <p>{{$certificate_student->certificate->title}}</p>
                    <h3>{{$certificate_student->name}}</h3>
                    <p class="email text-truncate email-search-item">{{$certificate_student->email}}</p>
                </div>
            </div>
            <div>
                <ul class="list-unstyled option-list d-flex align-items-center justify-content-between">
                    <li>
                        <a href="{{ route('certificate.exportPDF', ['certificateStudent'=>$certificate_student]) }}"
                           download="">
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
                </ul>
            </div>
        </div>
    </div><!-- worker card -->
@else
    <div class="alert alert-info text-center mb-3">لا يوجد نتيجة لعملية البحث</div
@endif
