 @php($settings = $store)
 <footer>
     <div class="custom-container">
         <div class="footer-content">
             <div class="footer-logo">
                 <img src="{{ $web_settings->get_logo ? asset($web_settings->get_logo->file_url) : asset('frontEnd/images/no_image.png') }}" alt="">
                 <span>{{ $store['footer_intro'] ?? 'Quality products delivered to your doorstep.' }}</span>
             </div>
             <div class="footer-links1 item">
                 <span>
                     Quick Links
                 </span>
                 <a href="{{ route('about_us') }}">About Us</a>
                 <a href="{{ route('return_policy') }}">Return Policy</a>
                 <a href="{{ route('delivery_policy') }}">Delivery Policy</a>
             </div>
             <div class="footer-links2 item">
                 <span>
                     Our Categories
                 </span>
                 @foreach ($footer_categories as $category)
                     <a href="{{ route('category.show', $category->id) }}">{{ $category->category_name }}</a>
                 @endforeach
             </div>

             <div class="pay item-2">
                 <span>We Accept</span>
                 <div class="pay-icons">
                     <img src="{{ asset('frontEnd') }}/images/pay-1.jpg" alt="">
                     <img src="{{ asset('frontEnd') }}/images/pay-2.jpg" alt="">
                     <img src="{{ asset('frontEnd') }}/images/pay-3.jpg" alt="">
                     <img src="{{ asset('frontEnd') }}/images/payment_icon_4.jpg" alt="">
                     <img src="{{ asset('frontEnd') }}/images/payment_icon_5.jpg" alt="">
                     <img src="{{ asset('frontEnd') }}/images/payment_icon_6.jpg" alt="">
                 </div>
             </div>
             <div class="social item-2">
                 <span>Follow Us</span>
                 <div class="social-icons">
                     @if (!empty($settings['facebook']))
                         <a class="facebook" href="{{ $settings['facebook'] }}" target="_blank">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                             </svg>
                         </a>
                     @endif
                     @if (!empty($settings['twitter']))
                         <a href="{{ $settings['twitter'] }}" class="twitter" target="_blank">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-brand-twitter">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path
                                     d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z" />
                             </svg>
                         </a>
                     @endif
                     @if (!empty($settings['instagram']))
                         <a href="{{ $settings['instagram'] }}" class="instagram" target="_blank">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                 <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                 <path d="M16.5 7.5v.01" />
                             </svg>
                         </a>
                     @endif
                     @if (!empty($settings['tiktok']))
                         <a href="{{ $settings['tiktok'] }}" class="tiktok" target="_blank">
                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="icon icon-tabler icons-tabler-outline icon-tabler-brand-tiktok">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path
                                     d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917z" />
                             </svg>
                         </a>
                     @endif
                 </div>
             </div>

         </div>
     </div>
     <div class="footer-bottom">
         {!! $web_settings->website_copyright_text ?? ('&copy; ' . date('Y') . ' ' . ($store['name'] ?? 'Store') . '. All rights reserved.') !!}
         Developed By <a href="https://prodevsltd.com" target="_blank">Pro Devs Ltd.</a>
     </div>
 </footer>
