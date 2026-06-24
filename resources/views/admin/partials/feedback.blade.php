<div id="sec-feedback" class="section">
    <div class="stat-card" style="margin-top: 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 1px solid #e2e8f0;">
            <div style="font-size: 1.15rem; font-weight: 700;">Manajemen Feedback & Koreksi User</div>
        </div>
        <div style="overflow-x: auto;">
            <table style="width: 100%; font-size: 0.85rem; border-collapse: collapse; min-width: 600px;">
                <tr style="background: #1F5F5B; color: white; text-align: left;">
                    <th style="padding: 18px 14px; font-weight: 600;">Pesan User</th>
                    <th style="padding: 18px 14px; font-weight: 600;">Rating</th>
                    <th style="padding: 18px 14px; font-weight: 600;">Hasil Prediksi AI</th>
                    <th style="padding: 18px 14px; font-weight: 600;">Koreksi Masukan</th>
                    <th style="padding: 18px 14px; font-weight: 600;">Waktu</th>
                    <th style="padding: 18px 14px; font-weight: 600; text-align: center;">Aksi</th>
                </tr>
                @foreach($recentFeedbacks as $f)
                <tr style="border-top: 1px solid #e2e8f0; transition: 0.2s;" class="feedback-row" data-id="{{ $f->id }}">
                    <td style="padding: 18px 14px; font-weight: 500; color: #334155;">"{{ $f->user_message }}"</td> 
                    <td style="padding: 18px 14px;">
                        @if($f->is_correct && ($f->is_intent_correct ?? true))
                            <span style="background: #d1fae5; color: #03563eff; padding: 4px 10px; border-radius: 12px; font-size: 0.72rem; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                Sesuai
                            </span>
                        @else
                            <span style="background: #fee2e2; color: #761616ff; padding: 4px 10px; border-radius: 12px; font-size: 0.72rem; font-weight: 700; display: inline-flex; align-items: center; gap: 4px;">
                                Tidak Sesuai
                            </span>
                        @endif
                    </td>
                    <td style="padding: 18px 14px; line-height: 1.4;">
                        <div style="font-size: 0.72rem; color: #64748b;">Maksud: <span style="background: #f1f5f9; color: #334155; padding: 1px 6px; border-radius: 4px; font-weight: 600;">{{ $f->intent ?? 'N/A' }}</span></div>
                        @if($f->dataRuangan)
                            <div style="font-size: 0.72rem; color: #64748b; margin-top: 2px;">Ruangan: <span style="color: #1F5F5B; font-weight: 600;">{{ $f->dataRuangan->nama_ruangan }}</span></div>
                        @endif
                    </td>
                    <td style="padding: 18px 14px; font-weight: 600;">
                        @if($f->correct_room_name)
                            <span style="color: #ca8a04; font-size: 0.75rem; background: #fef9c3; padding: 2px 8px; border-radius: 6px;">Koreksi Ruangan : "{{ $f->correct_room_name }}"</span>
                        @elseif(!is_null($f->is_intent_correct) && !$f->is_intent_correct)
                            <span style="color: #b45309; font-size: 0.75rem; background: #ffedd5; padding: 2px 8px; border-radius: 6px;">Koreksi Maksud : "{{ $f->intent }}"</span>
                        @else
                            <span style="color: #94a3b8; font-weight: 400; font-size: 0.75rem;">—</span>
                        @endif
                    </td>
                    <td style="padding: 18px 14px; font-size: 0.72rem; color: #64748b;">
                        {{ $f->created_at->diffForHumans() }}
                    </td>
                    <td style="padding: 18px 14px; text-align: center;">
                        <button class="action-btn btn-delete" style="background: none; border: none; padding: 6px; cursor: pointer; color: #dc2626; border-radius: 6px; background-color: #fee2e2; transition: 0.2s;" onclick="deleteSingleFeedback({{ $f->id }})" title="Hapus Feedback">
                            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <!-- Pagination Feedback -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px; font-size: 0.75rem; color: #64748b;">
            <div>Menampilkan {{ $recentFeedbacks->firstItem() ?? 0 }}–{{ $recentFeedbacks->lastItem() ?? 0 }} dari {{ $recentFeedbacks->total() }} feedback</div>
            <div style="display: flex; gap: 4px;">
                @if($recentFeedbacks->hasPages())
                    {{ $recentFeedbacks->links('pagination::simple-tailwind') }}
                @endif
            </div>
        </div>
    </div>
</div>
