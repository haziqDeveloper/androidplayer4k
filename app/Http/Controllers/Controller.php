<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Update the requested record by numeric id, or the first singleton row when
     * the legacy forms omit an id field.
     */
    protected function updateRequestedOrFirst(string $modelClass, Request $request, array $attributes): void
    {
        if ($request->filled('id')) {
            $validated = $request->validate([
                'id' => ['integer'],
            ]);

            /** @var Model $model */
            $model = $modelClass::query()->whereKey($validated['id'])->firstOrFail();
            $model->forceFill($attributes)->save();

            return;
        }

        /** @var Model $model */
        $model = $modelClass::query()->firstOrFail();
        $model->forceFill($attributes)->save();
    }

    protected function validateVersionPayload(Request $request): array
    {
        return $request->validate([
            'id' => ['sometimes', 'integer'],
            'version' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'file' => ['nullable', 'file', 'mimes:apk,pdf,png,jpg,jpeg', 'max:20480'],
        ]);
    }

    protected function validateUploadPayload(Request $request): array
    {
        return $request->validate([
            'id' => ['sometimes', 'integer'],
            'file' => ['required', 'file', 'mimes:apk,pdf,png,jpg,jpeg', 'max:20480'],
        ]);
    }

    protected function validateDomainPayload(Request $request): array
    {
        return $request->validate([
            'id' => ['sometimes', 'integer'],
            'url' => ['nullable', 'url', 'max:2048'],
        ]);
    }

    protected function validateContactPayload(Request $request): array
    {
        return $request->validate([
            'id' => ['sometimes', 'integer'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'info' => ['nullable', 'string', 'max:1000'],
        ]);
    }
}
