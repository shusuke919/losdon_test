import React from 'react';

import Button from '@mui/material/Button';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
           
                <div className="col-md-8">
                    <div className="card">
                  
                        <div className="card-header">テスト</div>

                        <div className="card-body">I'm an example component!</div>
                        <Button color="secondary" variant="contained" href={`/`}>Homeに遷移ボタン</Button>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

