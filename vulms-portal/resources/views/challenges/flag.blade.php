@extends('layouts.app')

@section('content')
   
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                @if ($status==1)
                    <div class="card bg-teal">
                    <div class="empty">
                        <div class="empty-img">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="350" height="350.98" viewBox="0 0 1100.11 731.98" xmlns:xlink="http://www.w3.org/1999/xlink"><title>finish line_katerina_limpitsouni</title><path d="M691.18,230C626.46,227.7,564.82,206.81,506,184s-117.16-48.19-180.33-60.3c-40.63-7.79-87.1-8.89-119.83,12.89-31.51,21-41.69,57.15-47.16,90.73-4.12,25.26-6.54,51.84,4.74,75.49,7.84,16.42,21.74,30.22,31.36,45.95,33.47,54.72,9.81,122.2-26.45,175.63-17,25.07-36.75,49-49.88,75.66s-19.2,57.25-7.71,84.47c11.38,27,38.51,47.24,67.9,61.49,59.69,28.94,130,37.23,198.61,41.92,151.83,10.39,304.46,5.89,456.69,1.39,56.34-1.67,112.92-3.36,168.34-12.07,30.78-4.84,62.55-12.52,84.9-31.05,28.36-23.53,35.39-63.38,16.38-92.88-31.88-49.49-120-61.78-142.31-114.9-12.26-29.23.33-61.8,18.16-88.91,38.24-58.16,102.33-109.19,105.7-175.68,2.32-45.66-28.49-91.39-76.13-113-49.93-22.65-119.18-19.8-156,17.69C815,217.08,748.33,231.93,691.18,230Z" transform="translate(-49.94 -84.01)" fill="#a80039" opacity="0.1"/><ellipse cx="171.26" cy="717.9" rx="73.21" ry="14.08" fill="#a80039"/><ellipse cx="170.03" cy="711.92" rx="8.52" ry="11.16" fill="#3f3d56"/><ellipse cx="170.03" cy="698.28" rx="8.52" ry="11.16" fill="#3f3d56"/><ellipse cx="170.03" cy="684.64" rx="8.52" ry="11.16" fill="#3f3d56"/><ellipse cx="170.03" cy="671.01" rx="8.52" ry="11.16" fill="#3f3d56"/><ellipse cx="170.03" cy="657.37" rx="8.52" ry="11.16" fill="#3f3d56"/><ellipse cx="170.03" cy="643.73" rx="8.52" ry="11.16" fill="#3f3d56"/><ellipse cx="170.03" cy="630.09" rx="8.52" ry="11.16" fill="#3f3d56"/><path d="M251.88,620.77a40.41,40.41,0,0,0,3.18-4.67l-22.4-3.68,24.22.18a40.87,40.87,0,0,0,.78-32.35l-32.49,16.86,30-22a40.83,40.83,0,1,0-67.44,45.69,41.2,41.2,0,0,0-4.66,7.45l29.08,15.1-31-10.4a40.81,40.81,0,0,0,6.58,38.34,40.83,40.83,0,1,0,64.18,0,40.83,40.83,0,0,0,0-50.49Z" transform="translate(-49.94 -84.01)" fill="#a80039"/><path d="M179,646a40.66,40.66,0,0,0,8.74,25.24,40.83,40.83,0,1,0,64.18,0C257.36,664.31,179,641.43,179,646Z" transform="translate(-49.94 -84.01)" opacity="0.1"/><path d="M575.89,632c.62,8,3.7,16.28,10.18,21s16.79,4.63,21.74-1.71a24.32,24.32,0,0,0,3.61-7.85c4.17-13.18,7.13-27.6,2.56-40.65-10.31-.67-22.26-5.52-30,3C577.73,612.73,575.17,622.75,575.89,632Z" transform="translate(-49.94 -84.01)" fill="#3f3d56"/><path d="M623.75,551.37c-1.37,11.63-3.7,23.21-3.46,34.92.09,4.52.57,9,.58,13.54a66.74,66.74,0,0,1-9,33.57,11.26,11.26,0,0,1-2.46,3.18c-2.37,1.92-5.94,1.76-8.6.29a16.92,16.92,0,0,1-6.11-6.63c-7.45-12.76-7.66-28.27-10.61-42.74-2.26-11.07-6.22-21.8-7.65-33-.93-7.21-.79-14.56-2.27-21.68-.45-2.15-1.71-5.38-2.54-8.55-.76-2.83-1.18-5.61-.4-7.52,1.59-3.91,6.8-2.39,10.19-2.15a234.58,234.58,0,0,0,35.86-.09c1.18-.09,2.52-.14,3.35.7a4.12,4.12,0,0,1,.8,1.45,48.53,48.53,0,0,1,2.17,8C625.25,533.37,624.79,542.5,623.75,551.37Z" transform="translate(-49.94 -84.01)" fill="#fabdbd"/><g opacity="0.1"><path d="M619.15,514.51a8.8,8.8,0,0,0-1.85,0c-5.72.46-11.45.69-17.17.72Q609.64,515.25,619.15,514.51Z" transform="translate(-49.94 -84.01)"/><path d="M602.83,636.87a16.92,16.92,0,0,1-6.11-6.63c-7.45-12.76-7.66-28.27-10.61-42.74-2.26-11.07-6.22-21.8-7.65-33-.93-7.21-.79-14.56-2.27-21.68-.45-2.15-1.71-5.38-2.54-8.55-.76-2.83-1.18-5.61-.4-7.52a4.26,4.26,0,0,1,4-2.6c-2.53-.17-5,.13-6,2.6-.78,1.91-.36,4.69.4,7.52.83,3.17,2.09,6.4,2.54,8.55,1.48,7.12,1.34,14.47,2.27,21.68,1.43,11.21,5.39,21.94,7.65,33,2.95,14.47,3.16,30,10.61,42.74a16.92,16.92,0,0,0,6.11,6.63,8.88,8.88,0,0,0,5.24,1.06A9.22,9.22,0,0,1,602.83,636.87Z" transform="translate(-49.94 -84.01)"/></g><path d="M661.56,612.7c-6,12-5,29-5,29,1,40-15,124-15,124h-14s-2-93,0-101-1-36-4-75c-2.23-29,3.84-55.28,7.1-66.81,1.12-4,1.9-6.19,1.9-6.19s23-34,36-18c3,3.72,4.59,11.23,5.14,20.71C675.48,550.69,666.16,603.49,661.56,612.7Z" transform="translate(-49.94 -84.01)" fill="#fabdbd"/><path d="M673.7,519.41c-.55-9.48-2.12-17-5.14-20.71-2.9-3.56-6.3-4.64-9.82-4.17a10.66,10.66,0,0,1,6.82,4.17c3,3.72,4.59,11.23,5.14,20.71,1.78,31.28-7.54,84.08-12.14,93.29-6,12-5,29-5,29,1,40-15,124-15,124h3s16-84,15-124c0,0-1-17,5-29C666.16,603.49,675.48,550.69,673.7,519.41Z" transform="translate(-49.94 -84.01)" opacity="0.1"/><path d="M620.28,762.05a13,13,0,0,0-2.86,3.12c-1.79,3.38.75,7.42,3.47,10.11s6,5.57,6,9.4c0,3.08-2.33,5.72-4.94,7.36-1.4.88-3.16,2-2.87,3.66a3.44,3.44,0,0,0,.53,1.17c2.24,3.43,6.21,5.44,10.23,6.2s8.17.43,12.26.1a2.47,2.47,0,0,0,1.68-.58,2.28,2.28,0,0,0,.45-1.38c.2-2.12.07-4.36,1-6.27,1.3-2.61,4.29-3.94,6-6.28,2.4-3.2,2.07-7.65,1.16-11.54-2-8.47-6.45-18.13-13.13-24C631.52,746.38,625.45,757.18,620.28,762.05Z" transform="translate(-49.94 -84.01)" fill="#3f3d56"/><path d="M650.58,258c5.58-8.34,4.13-20-1.57-28.3s-14.86-13.52-24.31-16.89c-12.74-4.54-26.79-6.09-39.88-2.68-10.42,2.71-19.78,8.38-29.6,12.76a127.29,127.29,0,0,1-55.28,11c-21.11-.59-44.24-6-61.95,5.54-32.42,21.09-18,78.49-48.67,102-8.27,6.34-18.68,9.11-27.88,14s-17.92,13.4-17.7,23.82c.1,5,2.3,9.77,5,14,11.5,18.23,33,29.51,54.53,29.3s42.54-11.66,54.95-29.28c3.11-4.41,5.85-9.32,10.36-12.26,9-5.9,20.86-1.77,31.6-.89,23.91,1.95,47.83-16,52.59-39.55,2-10.05,1.65-22.06,9.74-28.37,6.53-5.09,15.72-4,24-4.87,15.14-1.57,27.09-11,35.31-23.32,3.77-5.65,4.21-12.4,9.35-16.85C636.71,262.27,645.28,265.88,650.58,258Z" transform="translate(-49.94 -84.01)" fill="#3f3d56"/><g opacity="0.1"><path d="M479.94,235.82a126.77,126.77,0,0,0,26.17-2c-2.38.07-4.78.07-7.17,0-16.57-.46-34.38-3.88-49.84.24C459.3,234.16,469.85,235.54,479.94,235.82Z" transform="translate(-49.94 -84.01)"/><path d="M448.56,383c-4.51,2.94-7.25,7.85-10.36,12.26a70.25,70.25,0,0,1-39.47,27.21c1.17.05,2.34.08,3.52.07,21.55-.21,42.54-11.66,54.95-29.28,3.11-4.41,5.85-9.32,10.36-12.26l.78-.48C461.28,379.55,454.35,379.21,448.56,383Z" transform="translate(-49.94 -84.01)"/><path d="M648,229.67c-5.69-8.26-14.86-13.52-24.31-16.89-12.74-4.54-26.79-6.09-39.88-2.68-.3.07-.59.16-.88.24a76.55,76.55,0,0,1,21.76,4.44c9.45,3.37,18.62,8.63,24.31,16.89s7.15,20,1.57,28.3c-5.3,7.91-13.87,4.3-19.48,9.17-5.14,4.45-5.58,11.2-9.35,16.85-7.07,10.57-16.91,19-29.16,22.2,4.21-.5,8.65-.44,12.85-.88,15.14-1.57,27.09-11,35.31-23.32,3.77-5.65,4.21-12.4,9.35-16.85,5.61-4.87,14.18-1.26,19.48-9.17C655.16,249.63,653.71,237.93,648,229.67Z" transform="translate(-49.94 -84.01)"/><path d="M566.44,309.31c-8.23.86-17.42-.22-24,4.87-8.09,6.31-7.7,18.32-9.74,28.37C529.19,360.12,514.93,374.61,498,380l1.19.11c23.91,1.95,47.83-16,52.59-39.55,2-10.05,1.65-22.06,9.74-28.37a18.06,18.06,0,0,1,6.21-3C567.28,309.2,566.87,309.27,566.44,309.31Z" transform="translate(-49.94 -84.01)"/></g><path d="M808.06,222.2s-24,48-32,66-81,45-91,46a12.88,12.88,0,0,0-7.14,3.44c-5.65,5-8.86,13.56-8.86,13.56s4,27-1,72c-.1.87-.19,1.74-.27,2.58-4.36,42.82,4.77,52.92,4.77,52.92s-97,37-94-11c.94-15.11.8-26.15-.13-35.38a148.57,148.57,0,0,0-5.74-27.86c-2.37-8.29-5.2-17.38-8.13-29.76A130.53,130.53,0,0,0,559,356.55c-.07-.18-.14-.36-.2-.53-5-12.41-10-16.42-12.86-17.72a43.23,43.23,0,0,1-7.68-4.32c-9.24-6.67-29.07-21.62-46.73-39.28-24-24-48-81-48-81s-7-33,9-60,9,53,9,53,29,39,36,57c3.6,9.26,9.32,14,14,16.46A166,166,0,0,1,533.67,294a129.29,129.29,0,0,0,14.89,9.72c11.18,6,24.57,12.77,35.73,14.55a33.69,33.69,0,0,0,5.27.45,5.46,5.46,0,0,0,4.4-2c3-3.53,2.93-11.13,2.24-17.38a88.32,88.32,0,0,0-1.64-9.63s32.5-20.5,31.5,4.5a27.94,27.94,0,0,0,.76,8.22,14.25,14.25,0,0,0,9.69,10.6,24,24,0,0,0,12,.39,11.73,11.73,0,0,0,3.54-1.21c3-2,33-11,42-12s54-23,54-23l49-68s-1-40,19-56S808.06,222.2,808.06,222.2Z" transform="translate(-49.94 -84.01)" fill="#fabdbd"/><g opacity="0.1"><path d="M667.79,419.78a199.39,199.39,0,0,0-1.15,24.2c.1-5.28.45-11.31,1.15-18.2.08-.84.17-1.71.27-2.58a392.15,392.15,0,0,0,2.5-46.39,401.7,401.7,0,0,1-2.5,40.39C668,418.07,667.87,418.94,667.79,419.78Z" transform="translate(-49.94 -84.01)"/><path d="M595.6,289.07c-.67.39-1,.63-1,.63a85.66,85.66,0,0,1,1.92,13A61.34,61.34,0,0,0,595.6,289.07Z" transform="translate(-49.94 -84.01)"/><path d="M462,201.27c.49-7,1.22-19.55,1.08-30.71-.17,14.92-1.5,30.14-1.5,30.14Z" transform="translate(-49.94 -84.01)"/><path d="M578.63,466.53c0,.39,0,.78-.07,1.17-3,48,94,11,94,11a16.28,16.28,0,0,1-2.53-5.08C655.42,478.82,582,503,578.63,466.53Z" transform="translate(-49.94 -84.01)"/><path d="M808.06,216.2s-24,48-32,66-81,45-91,46a12.88,12.88,0,0,0-7.14,3.44c-5.65,5-8.86,13.56-8.86,13.56s.24,1.63.53,4.73c1.12-2.57,4-8.47,8.33-12.29a12.88,12.88,0,0,1,7.14-3.44c10-1,83-28,91-46s32-66,32-66,16.91-51.35,15.05-66.71C821.57,175.17,808.06,216.2,808.06,216.2Z" transform="translate(-49.94 -84.01)"/><path d="M578.43,426.32a148.57,148.57,0,0,0-5.74-27.86c-2.37-8.29-5.2-17.38-8.13-29.76A130.53,130.53,0,0,0,559,350.55c-.07-.18-.14-.36-.2-.53-5-12.41-10-16.42-12.86-17.72a43.23,43.23,0,0,1-7.68-4.32c-9.24-6.67-29.07-21.62-46.73-39.28-24-24-48-81-48-81a90.42,90.42,0,0,1-1.48-14.58,96.4,96.4,0,0,0,1.48,20.58s24,57,48,81c17.66,17.66,37.49,32.61,46.73,39.28A43.23,43.23,0,0,0,546,338.3c2.85,1.3,7.84,5.31,12.86,17.72.06.17.13.35.2.53a130.53,130.53,0,0,1,5.53,18.15c2.93,12.38,5.76,21.47,8.13,29.76a148.57,148.57,0,0,1,5.74,27.86c.42,4.18.67,8.73.74,13.85A174.17,174.17,0,0,0,578.43,426.32Z" transform="translate(-49.94 -84.01)"/></g><path d="M677.47,382.88a59.56,59.56,0,0,0-4,7.88c-1.51,4.2-1.52,8.77-1.8,13.22a106.14,106.14,0,0,1-2.84,18.52,20.48,20.48,0,0,1-1,3.28,8.67,8.67,0,0,1-1.17,2,8.53,8.53,0,0,1-1.86,1.69,21.82,21.82,0,0,1-3.39,1.85c-13.92,6.5-29.1,12.24-44.29,10a64.45,64.45,0,0,1-18.43-6.2c-5.5-2.67-11.72-5.84-17.42-3.62h0a8.77,8.77,0,0,1-2.79.87,2.65,2.65,0,0,1-.56-.05c-1.88-.36-1.88-6.7-2.31-8.57-1.64-7.18-1.89-13-2.87-19.24a63.13,63.13,0,0,0-2.41-10.17c-4-12.1-5.21-25-5.21-37.68,0-.63-4.5,0-6-.06-.38,0-.59-.06-.5-.19a2,2,0,0,1,.3-.34,4.57,4.57,0,0,1,1.79-.89l1.18-.35c6.18-1.75,13-2.48,17.62-6.83,4.8-4.49,6-11.66,5.79-18.22-.06-2.11-1.09-7.23-.92-11.48a33.69,33.69,0,0,0,5.27.45,5.46,5.46,0,0,0,4.4-2,79,79,0,0,1,4.32,10c1.7,4.18,3,8.58,5.49,12.36,4,6.16,11.38,10.21,18.72,9.59s14.17-6.26,15.48-13.5c1.15-6.35-1.52-15.49-1.46-22.09a24,24,0,0,0,12,.39,10.84,10.84,0,0,1,.43,1.25c2.25,7.72,5.25,16.58,12.8,19.32,4.88,1.76,10.65.44,15.16,3a9.73,9.73,0,0,1,1,.66,11.07,11.07,0,0,1,2.65,2.81,22.59,22.59,0,0,1,3.21,10.08A55.92,55.92,0,0,1,677.47,382.88Z" transform="translate(-49.94 -84.01)" fill="#a80039"/><path d="M626.82,302.42a34.08,34.08,0,0,1-30.62-3.09,88.32,88.32,0,0,0-1.64-9.63s32.5-20.5,31.5,4.5A27.94,27.94,0,0,0,626.82,302.42Z" transform="translate(-49.94 -84.01)" opacity="0.1"/><circle cx="564.61" cy="184.69" r="34" fill="#fabdbd"/><path d="M555.06,353.2s66-42,271,3,324,9,324,9v47s-230,25-318,0-213.27-39.42-257.14-.71Z" transform="translate(-49.94 -84.01)" fill="#f86d70"/><path d="M555.06,353.2s66-42,271,3,324,9,324,9v47s-230,25-318,0-213.27-39.42-257.14-.71Z" transform="translate(-49.94 -84.01)" opacity="0.1"/><path d="M557.06,355.2s64-42,269,3,322,9,322,9l1,43s-228,25-316,0-212.27-42.42-256.14-3.71Z" transform="translate(-49.94 -84.01)" fill="#f86d70"/><path d="M533,419.8s-66,42-271-3-195-9-195-9v-47s101-25,189,0,213.27,39.42,257.14.71Z" transform="translate(-49.94 -84.01)" fill="#f86d70"/><path d="M533,419.8s-66,42-271-3-195-9-195-9v-47s101-25,189,0,213.27,39.42,257.14.71Z" transform="translate(-49.94 -84.01)" opacity="0.1"/><path d="M531,417.8s-64,42-269-3-193-9-193-9l-1-43s99-25,187,0,212.27,42.42,256.14,3.71Z" transform="translate(-49.94 -84.01)" fill="#f86d70"/><path d="M585.31,274.33c-1-6.24-2.54-14.1,2.68-17.67a11.1,11.1,0,0,1,6.19-1.6c10.81-.11,21.14,7.42,31.74,5.22a17.89,17.89,0,0,0,7-31.87c-4.17-3.1-9.44-4.22-14.54-5.27-13.41-2.76-27.41-5.51-40.65-2s-25.34,15.38-24.28,29c.5,6.52,3.82,12.44,7.29,18,2.64,4.22,12.92,24,17.91,24.3C585.69,292.85,586,278.41,585.31,274.33Z" transform="translate(-49.94 -84.01)" fill="#3f3d56"/><path d="M669.56,461.7s-69,17-92,0c0,0-10,39-7,59,0,0,49,3,54,6,0,0,1-8,6-4,0,0,17-20,48-2C678.56,520.7,684.56,473.7,669.56,461.7Z" transform="translate(-49.94 -84.01)" fill="#a80039"/><path d="M632.94,228.41a19.84,19.84,0,0,0-2.23-1.4,17.85,17.85,0,0,1-9.79,29.27c-10.6,2.2-20.93-5.33-31.74-5.22a11.1,11.1,0,0,0-6.19,1.6c-5.22,3.57-3.69,11.43-2.69,17.67.66,4.08.39,18.52-6.63,18.13l-.12,0c1.93,2.35,3.73,3.94,5.12,4,7,.39,7.29-14,6.63-18.13-1-6.24-2.53-14.1,2.69-17.67a11.1,11.1,0,0,1,6.19-1.6c10.81-.11,21.14,7.42,31.74,5.22a17.89,17.89,0,0,0,7-31.87Z" transform="translate(-49.94 -84.01)" opacity="0.1"/><g opacity="0.1"><path d="M136.3,180.91s-74.77-31.44-84.57,25.26c0,0-5.11,8.83,2,16.13,0,0,1.53-3.91,8.76.14a37.6,37.6,0,0,0,8.16,3.31,18.36,18.36,0,0,0,11.62-.62h0s24.59-1.33,45.27-33.5c0,0,8.86-5.48,9.31-7.53l-14.82,1s1.13,10.85-5,17.36c0,0,5.45-16.83,2.83-17.31-.53-.1-7.83.87-7.83.87s1.89,18.86-8,28.62c0,0,9.18-19.19,5.18-28.28l-10.93,2.11s3,19.84-7.82,31.39c0,0,8.89-20.4,5.46-30.77l-10.48,3.52s2.53,19.42-6.52,29c0,0,7.9-24.61,4.18-28,0,0-9.42,3.82-11.44,6,0,0,1.5,14-4.26,19,0,0,3.54-17,1.79-17.7,0,0-10.95,8.24-14.28,15.35,0,0,4.16-10.86,12.9-17,0,0-7.34-1.24-13,1.83,0,0,3.79-7.21,15.65-3.79,0,0,8.79-6.08,10.55-6,0,0-11.22-5-19.33-4.39,0,0,8.69-5,22.08,3.36l10.44-3.78s-14.49-7.43-21.76-7.4c0,0,9.66-3.73,24.48,6.67l10.69-2.19s-12-7.35-20.09-9.06c0,0,9.71-1.53,23.18,8.56l7.32-.62s-8.86-5.21-11.54-6.48-2.56-2.1-2.56-2.1a34.9,34.9,0,0,1,17.17,8.26S136.23,181.84,136.3,180.91Z" transform="translate(-49.94 -84.01)" fill="#a80039"/></g><g opacity="0.1"><path d="M133.54,124.55S107,63.28,68.91,91.38c0,0-8.07,2.34-8,10.7,0,0,3.14-1.45,5.12,5.07a31.39,31.39,0,0,0,3,6.62A15,15,0,0,0,76.22,120h0s15.36,13.22,46,5.89c0,0,8.39,1.8,9.83.83l-9.37-7.86s-5.5,7.09-12.88,7.44c0,0,12.83-6.9,11.54-8.68-.26-.36-5.14-3.94-5.14-3.94s-9.63,12.28-21,12.47c0,0,16.39-6.18,19.19-13.85l-7.69-5s-9.54,13.49-22.53,14.19c0,0,16.9-7,20.77-15.16l-8.23-3.88s-9.56,13-20.37,13.49c0,0,18.71-10.12,18.42-14.25,0,0-7.77-3.1-10.23-2.92,0,0-7.07,9.15-13.38,8.89,0,0,11.79-8.09,11.14-9.5,0,0-11.2-1.34-17.23,1,0,0,8.66-4.08,17.35-2.74,0,0-3.65-4.93-8.74-6.3,0,0,6.36-2.13,11.46,6.66,0,0,8.68,1.39,9.69,2.43,0,0-3.8-9.39-9-13.62,0,0,8,2,11.2,14.57l8.35,3.71S101,91.2,96.61,87.09c0,0,7.87,3.28,10.75,17.9l7.59,4.79S112,98.58,108.18,93c0,0,6.64,4.61,8.9,18.28l4.7,3.8s-2.3-8.14-3.17-10.42-.32-2.7-.32-2.7a28.81,28.81,0,0,1,5.49,14.69S133,125.07,133.54,124.55Z" transform="translate(-49.94 -84.01)" fill="#a80039"/></g></svg>
                        </div>
                        <h1>Selamat Anda Berhasil Menyelesaikan Tantangan Ini!</h1>
                     
                        <div class="empty-action">
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            Kembali ke Dashboard
                        </a>
                        </div>
                    </div>
                    </div>
             
                    <hr>
                    @elseif ($status==3) 
                    <h3>Coba lagi!</h3>
                    @else
                    <h3> Input flag anda untuk challenge {{ $idchal }}</h3>
                     @endif
      
                                <form  class="form" action="{{ route('verifikasiflag') }}" method="post" autocomplete="off">
                                    @csrf
                                    <div class="mb-3">
                                        
                                        <input id="userId" name="userId" type="hidden" class="form-control" value="{{  auth()->user()->id }}"> 
                                        <input id="challengeId" name="challengeId" type="hidden" class="form-control" value="{{ $idchal }}">
                                        <label class="form-label required"> Flag code : </label>
                                        <input id="flag" name="flag" type="text" class="form-control" required placeholder="Flag Code">
                                    </div>

                                    <button class="btn btn-success" >Submit Flag</button>
                                </form>

              
                </div>
                 
            </div>
        </div>
    </div>

    
    <div class="modal modal-blur fade" id="modal-flag-success" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-status bg-success"></div>
                            <div class="modal-body text-center py-4">
                              <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
                              <h3>Flag berhasil disubmit</h3>
                            </div>
                            <div class="modal-footer">
                              <div class="w-100">
                                <div class="row">
                                  <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                      Go to dashboard
                                    </a></div>
                                  
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>




@endsection
