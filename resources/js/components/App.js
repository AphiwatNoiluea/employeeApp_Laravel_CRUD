import React from 'react';
import Table from './employeeList/Table'
import ReactDOM from 'react-dom';

function App() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                {/*component is here.*/}
                <Table />
            </div>
        </div>
    );
}

export default App;