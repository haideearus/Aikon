import React from 'react';

class MyComponent extends React.Component {
  constructor(props) {
    super(props);
    this.handleClick = this.handleClick.bind(this);
  }

  handleClick() {
    fetch('connectare.php')
      .then(response => response.json())
      .then(data => {
        // Procesează datele primite de la server
        console.log(data);
      })
      .catch(error => {
        // Gestionează eroarea în cazul în care solicitarea a eșuat
        console.error('Eroare:', error);
      });
  }

  render() {
    return (
      <div>
        <button onClick={this.handleClick}>Trimite cererea</button>
      </div>
    );
  }
}

export default MyComponent;
