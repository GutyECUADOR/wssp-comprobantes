<div class="p-6">
    <div class="max-w-7xl mx-auto space-y-6">

        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">Lista de resultados</span>
                @if($recordCount > 0)
                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-bold">
                    {{ $recordCount }} registros totales
                </span>
                @endif
            </div>

            <div class="overflow-x-auto">
                @if(count($rows) > 0)
                <table class="w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            @foreach($headers as $header)
                            <th class="px-6 py-3 font-semibold uppercase tracking-wider border-r border-gray-700 last:border-0">
                                {{ $header }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($rows as $index => $row)
                        <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors">
                            @foreach($headers as $header)
                            <td class="px-6 py-4 text-gray-700 whitespace-nowrap border-r border-gray-100 last:border-0">
                                {{-- Lógica para la imagen del comprobante --}}
                                @if($header === 'comprobante_file')
                                @if(!empty($row[$header]))
                                <div class="flex items-center justify-center">
                                    @if(Str::endsWith($row[$header], '.pdf'))
                                    <a href="{{ asset('storage/' . $row[$header]) }}" target="_blank" class="text-blue-500">Ver comprobante en PDF</a>
                                    @else
                                    <a href="{{ asset('storage/' . $row[$header]) }}" target="_blank" class="text-blue-500">Ver imagen del comprobante </a>
                                    <!-- <img src="{{ asset('storage/' . $row[$header]) }}"
                                        alt="Comprobante"
                                        class="h-12 w-12 object-cover rounded border border-gray-300 shadow-sm hover:scale-110 transition-transform cursor-pointer"> -->
                                    @endif
                                </div>
                                @else
                                <span class="text-gray-400 italic">Sin archivo</span>
                                @endif

                                {{-- Lógica para el resto de columnas --}}
                                @else
                                {{ $row[$header] ?? '-' }}
                                @endif
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                @if($recordCount > 50)
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-sm text-blue-700">
                        Se están mostrando 50 de {{ $recordCount }} registros totales.
                        <a href="#" class="font-semibold underline hover:text-blue-900">Ver todos</a>
                    </p>
                </div>
                @endif
                @else
                <div class="py-20 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No hay datos</h3>
                    <p class="mt-1 text-sm text-gray-500">No existen registros que mostrar.</p>
                </div>
                @endif
            </div>

            @if(count($rows) > 0)
            <div class="p-4 bg-gray-50 border-t border-gray-200 text-xs text-gray-400 italic">
                * Vista páginada a 10 registros.
            </div>
            @endif
            <div class="mt-4">
                {{ $rows->links() }}
            </div>
        </div>
    </div>
</div>